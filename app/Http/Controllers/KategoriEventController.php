<?php

namespace App\Http\Controllers;

use App\Models\KategoriEvent;
use Illuminate\Http\Request;

class KategoriEventController extends Controller
{
    // Menampilkan semua data
    public function index()
    {
        $kategoriEvents = KategoriEvent::all();
        return view('layouts.kategori.index', compact('kategoriEvents'));
    }

    // Menampilkan form tambah
    public function create()
    {
        return view('layouts.kategori.create');
    }

    // Menyimpan data
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'description' => 'required',
        ]);

        KategoriEvent::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect('/kategori')->with('success', 'Kategori berhasil ditambahkan.');
    }

    // Menampilkan detail
    public function show($id)
    {
        $kategori = KategoriEvent::findOrFail($id);
        return view('layouts.kategori.show', compact('kategori'));
    }

    // Menampilkan form edit
    public function edit($id)
    {
        $kategori = KategoriEvent::findOrFail($id);
        return view('layouts.kategori.edit', compact('kategori'));
    }

    // Update data
    public function update(Request $request, $id)
    {
        $kategori = KategoriEvent::findOrFail($id);

        $kategori->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return redirect('/kategori');
    }

    // Hapus data
    public function destroy($id)
    {
        $kategori = KategoriEvent::findOrFail($id);
        $kategori->delete();

        return redirect('/kategori');
    }
}