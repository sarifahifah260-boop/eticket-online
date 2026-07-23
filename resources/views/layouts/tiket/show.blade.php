@extends('layouts.app')

@section('title', 'Detail Tiket')

@section('content')

<div class="container">

    <h2 class="mb-4">Detail Tiket</h2>

    <table class="table table-bordered">

        <tr>
            <th width="250">ID</th>
            <td>{{ $tiket->id }}</td>
        </tr>

        <tr>
            <th>Event</th>
            <td>{{ $tiket->event->title }}</td>
        </tr>

        <tr>
            <th>Nama Tiket</th>
            <td>{{ $tiket->name }}</td>
        </tr>

        <tr>
            <th>Harga</th>
            <td>
                Rp {{ number_format($tiket->price,0,',','.') }}
            </td>
        </tr>

        <tr>
            <th>Kuota</th>
            <td>{{ $tiket->quota }}</td>
        </tr>

        <tr>
            <th>Sisa Kuota</th>
            <td>{{ $tiket->remaining_quota }}</td>
        </tr>

        <tr>
            <th>Deskripsi</th>
            <td>{{ $tiket->description ?? '-' }}</td>
        </tr>

    </table>

    <a href="{{ route('tiket.index') }}" class="btn btn-secondary">
        Kembali
    </a>

</div>

@endsection