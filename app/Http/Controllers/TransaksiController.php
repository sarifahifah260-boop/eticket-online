<?php

namespace App\Http\Controllers;

use App\Models\Transaksi;
use App\Models\TransaksiTiket;
use App\Models\Tiket;
use App\Models\ETicket;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

use SimpleSoftwareIO\QrCode\Facades\QrCode;

class TransaksiController extends Controller
{
    /**
     * Menampilkan daftar transaksi
     */
    public function index()
    {
        $transaksis = Transaksi::latest()->get();

        return view('layouts.transaksi.index', compact('transaksis'));
    }

    /**
     * Form pembelian tiket
     */
    public function create()
    {
        $tikets = Tiket::with('event')->get();

        return view('layouts.transaksi.create', compact('tikets'));
    }

    /**
     * Menyimpan transaksi
     */
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'customer_email' => 'required|email',
            'customer_phone' => 'required',
            'ticket' => 'required|array'
        ]);

        DB::beginTransaction();

        try {

            $invoice = 'INV-' . date('YmdHis');

            $transaksi = Transaksi::create([
                'invoice_number' => $invoice,
                'customer_name' => $request->customer_name,
                'customer_email' => $request->customer_email,
                'customer_phone' => $request->customer_phone,
                'total_price' => 0,
                'payment_status' => 'Pending'
            ]);

            $total = 0;

            foreach ($request->ticket as $item) {

                if (empty($item['tiket_id']) || empty($item['qty'])) {
                    continue;
                }

                $tiket = Tiket::findOrFail($item['tiket_id']);

                /*
                 * CEK KUOTA
                 */
                if ($item['qty'] > $tiket->remaining_quota) {

                    DB::rollBack();

                    return back()->withErrors([
                        'Kuota tiket "' . $tiket->name . '" tidak mencukupi.'
                    ])->withInput();
                }

                $subtotal = $item['qty'] * $tiket->price;

                TransaksiTiket::create([
                    'transaksi_id' => $transaksi->id,
                    'tiket_id' => $tiket->id,
                    'qty' => $item['qty'],
                    'price' => $tiket->price,
                    'subtotal' => $subtotal
                ]);

                /*
                 * Kurangi sisa kuota
                 */
                $tiket->remaining_quota -= $item['qty'];
                $tiket->save();

                $total += $subtotal;
            }

            $transaksi->update([
                'total_price' => $total
            ]);

            /*
|--------------------------------------------------------------------------
| Membuat E-Ticket
|--------------------------------------------------------------------------
*/


            $ticketCode = 'ETKT-' . strtoupper(Str::random(10));


            // Buat data e-ticket terlebih dahulu

            $eticket = ETicket::create([

                'transaksi_id' => $transaksi->id,

                'ticket_code' => $ticketCode,

                'qr_code' => null,

                'is_used' => false,

                'used_at' => null,

            ]);


            // Nama file QR

            $fileName = $ticketCode . '.svg';


            // Isi QR Code menuju halaman e-ticket

            QrCode::format('svg')
                ->size(300)
                ->generate(
                    route('eticket.show', $eticket->id),
                    storage_path('app/public/qrcodes/' . $fileName)
                );

            // Update lokasi QR Code

            $eticket->update([

                'qr_code' => $fileName

            ]);

            DB::commit();

            return redirect()
                ->route('transaksi.index')
                ->with('success', 'Transaksi berhasil.');
        } catch (\Exception $e) {

            DB::rollBack();

            return back()->withErrors($e->getMessage());
        }
    }

    /**
     * Detail transaksi
     */
    public function show($id)
    {
        $transaksi = Transaksi::with('transaksiTikets.tiket')
            ->findOrFail($id);

        return view('layouts.transaksi.show', compact('transaksi'));
    }

    public function edit($id)
    {
        return redirect()->route('transaksi.index');
    }

    public function update(Request $request, $id)
    {
        return redirect()->route('transaksi.index');
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        foreach ($transaksi->transaksiTikets as $detail) {

            $tiket = $detail->tiket;

            $tiket->remaining_quota += $detail->qty;

            $tiket->save();
        }

        $transaksi->delete();

        return redirect()->route('transaksi.index')
            ->with('success', 'Transaksi berhasil dihapus.');
    }
}
