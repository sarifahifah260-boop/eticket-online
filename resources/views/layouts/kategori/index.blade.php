@extends('layouts.app')

@section('title', 'Daftar Kategori')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Daftar Kategori</h1>
        <a href="{{ url('/kategori/create') }}" class="btn btn-primary">Buat Kategori</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($kategoriEvents ?? [] as $kategori)
                <tr>
                    <td>{{ $kategori->id }}</td>
                    <td>{{ $kategori->name }}</td>
                    <td>
                        <a href="{{ url('/kategori/'.$kategori->id) }}" class="btn btn-sm btn-secondary">Lihat</a>
                        <a href="{{ url('/kategori/'.$kategori->id.'/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="3" class="text-center">Tidak ada kategori.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
