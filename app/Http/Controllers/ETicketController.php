<?php

namespace App\Http\Controllers;

use App\Models\ETicket;

class ETicketController extends Controller
{
    /**
     * Menampilkan semua E-Ticket
     */
    public function index()
    {
        $etickets = ETicket::with('transaksi')
            ->latest()
            ->get();

        return view('layouts.eticket.index', compact('etickets'));
    }

    /**
     * Menampilkan detail E-Ticket
     */
    public function show($id)
    {
        $eticket = ETicket::with('transaksi.transaksiTikets.tiket.event')
            ->findOrFail($id);

        return view('layouts.eticket.show', compact('eticket'));
    }

    public function create()
    {
        abort(404);
    }

    public function store()
    {
        abort(404);
    }

    public function edit($id)
    {
        abort(404);
    }

    public function update()
    {
        abort(404);
    }

    public function destroy($id)
    {
        $eticket = ETicket::findOrFail($id);

        $eticket->delete();

        return redirect()
            ->route('eticket.index')
            ->with('success', 'E-Ticket berhasil dihapus.');
    }
}