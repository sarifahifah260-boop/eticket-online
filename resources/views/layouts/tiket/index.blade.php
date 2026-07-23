@extends('layouts.app')

@section('title', 'Daftar Tiket')

@section('content')

<div class="d-flex justify-content-between align-items-center mb-3">
    <h1>Daftar Tiket</h1>

    <a href="{{ route('tiket.create') }}" class="btn btn-primary">
        Tambah Tiket
    </a>
</div>

@if(session('success'))
    <div class="alert alert-success">
        {{ session('success') }}
    </div>
@endif

<table class="table table-bordered table-striped">
    <thead class="table-dark">
        <tr>
            <th>ID</th>
            <th>Event</th>
            <th>Nama Tiket</th>
            <th>Harga</th>
            <th>Kuota</th>
            <th>Sisa Kuota</th>
            <th width="220">Aksi</th>
        </tr>
    </thead>

    <tbody>

    @forelse($tikets as $tiket)

        <tr>

            <td>{{ $tiket->id }}</td>

            <td>{{ $tiket->event->title }}</td>

            <td>{{ $tiket->name }}</td>

            <td>
                Rp {{ number_format($tiket->price,0,',','.') }}
            </td>

            <td>{{ $tiket->quota }}</td>

            <td>{{ $tiket->remaining_quota }}</td>

            <td>

                <a href="{{ route('tiket.show',$tiket->id) }}"
                    class="btn btn-secondary btn-sm">
                    Lihat
                </a>

                <a href="{{ route('tiket.edit',$tiket->id) }}"
                    class="btn btn-warning btn-sm">
                    Edit
                </a>

                <form action="{{ route('tiket.destroy',$tiket->id) }}"
                    method="POST"
                    class="d-inline">

                    @csrf
                    @method('DELETE')

                    <button
                        class="btn btn-danger btn-sm"
                        onclick="return confirm('Yakin ingin menghapus tiket ini?')">

                        Hapus

                    </button>

                </form>

            </td>

        </tr>

    @empty

        <tr>

            <td colspan="7" class="text-center">

                Belum ada data tiket.

            </td>

        </tr>

    @endforelse

    </tbody>

</table>

@endsection