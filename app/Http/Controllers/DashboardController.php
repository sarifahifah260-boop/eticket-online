<?php

namespace App\Http\Controllers;

use App\Models\Event;
use App\Models\KategoriEvent;
use App\Models\Tiket;
use App\Models\Transaksi;

class DashboardController extends Controller
{
    public function index()
    {
        $jumlahKategori = KategoriEvent::count();

        $jumlahEvent = Event::count();

        $jumlahTiket = Tiket::count();

        $jumlahTransaksi = Transaksi::count();

        $totalPendapatan = Transaksi::where('payment_status','Paid')
                            ->sum('total_price');

        return view('dashboard', compact(
            'jumlahKategori',
            'jumlahEvent',
            'jumlahTiket',
            'jumlahTransaksi',
            'totalPendapatan'
        ));
    }
}