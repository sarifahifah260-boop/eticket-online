@extends('layouts.app')

@section('title', 'Daftar Event')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Daftar Event</h1>
        <a href="{{ url('/event/create') }}" class="btn btn-primary">Buat Event</a>
    </div>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Judul</th>
                <th>Kategori</th>
                <th>Mulai</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @forelse($events ?? [] as $event)
                <tr>
                    <td>{{ $event->id }}</td>
                    <td>{{ $event->title }}</td>
                    <td>{{ $event->kategoriEvent->name ?? '-' }}</td>
                    <td>{{ $event->start_at }}</td>
                    <td>
                        <a href="{{ url('/event/'.$event->id) }}" class="btn btn-sm btn-secondary">Lihat</a>
                        <a href="{{ url('/event/'.$event->id.'/edit') }}" class="btn btn-sm btn-warning">Edit</a>
                    </td>
                </tr>
            @empty
                <tr>
                    <td colspan="5" class="text-center">Tidak ada event.</td>
                </tr>
            @endforelse
        </tbody>
    </table>
@endsection
