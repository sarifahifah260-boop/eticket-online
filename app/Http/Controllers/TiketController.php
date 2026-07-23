<?php

namespace App\Http\Controllers;

use App\Models\Tiket;
use App\Models\Event;
use Illuminate\Http\Request;

class TiketController extends Controller
{
    /**
     * Menampilkan daftar tiket
     */
    public function index()
    {
        $tikets = Tiket::with('event')->get();

        return view('layouts.tiket.index', compact('tikets'));
    }

    /**
     * Menampilkan form tambah tiket
     */
    public function create()
    {
        $events = Event::all();

        return view('layouts.tiket.create', compact('events'));
    }

    /**
     * Menyimpan tiket baru
     */
    public function store(Request $request)
    {
        $request->validate([
            'event_id'    => 'required|exists:events,id',
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'quota'       => 'required|integer|min:1',
            'description' => 'nullable|string',
        ]);

        Tiket::create([
            'event_id'         => $request->event_id,
            'name'             => $request->name,
            'price'            => $request->price,
            'quota'            => $request->quota,
            // Saat tiket dibuat, sisa kuota = kuota awal
            'remaining_quota'  => $request->quota,
            'description'      => $request->description,
        ]);

        return redirect()->route('tiket.index')
                         ->with('success', 'Tiket berhasil ditambahkan.');
    }

    /**
     * Menampilkan detail tiket
     */
    public function show($id)
    {
        $tiket = Tiket::with('event')->findOrFail($id);

        return view('layouts.tiket.show', compact('tiket'));
    }

    /**
     * Menampilkan form edit tiket
     */
    public function edit($id)
    {
        $tiket = Tiket::findOrFail($id);
        $events = Event::all();

        return view('layouts.tiket.edit', compact('tiket', 'events'));
    }

    /**
     * Mengupdate data tiket
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'event_id'    => 'required|exists:events,id',
            'name'        => 'required|string|max:255',
            'price'       => 'required|numeric|min:0',
            'quota'       => 'required|integer|min:1',
            'description' => 'nullable|string',
        ]);

        $tiket = Tiket::findOrFail($id);

        // Menyesuaikan sisa kuota jika kuota total diubah
        $selisih = $request->quota - $tiket->quota;

        $tiket->update([
            'event_id'         => $request->event_id,
            'name'             => $request->name,
            'price'            => $request->price,
            'quota'            => $request->quota,
            'remaining_quota'  => max(0, $tiket->remaining_quota + $selisih),
            'description'      => $request->description,
        ]);

        return redirect()->route('tiket.index')
                         ->with('success', 'Tiket berhasil diperbarui.');
    }

    /**
     * Menghapus tiket
     */
    public function destroy($id)
    {
        $tiket = Tiket::findOrFail($id);
        $tiket->delete();

        return redirect()->route('tiket.index')
                         ->with('success', 'Tiket berhasil dihapus.');
    }
}