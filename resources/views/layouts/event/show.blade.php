@extends('layouts.app')

@section('title', 'Detail Event')

@section('content')
    <h1>Detail Event</h1>

    <div class="mb-3"><strong>Judul:</strong> {{ $event->title }}</div>
    <div class="mb-3"><strong>Kategori:</strong> {{ $event->kategoriEvent->name ?? '-' }}</div>
    <div class="mb-3"><strong>Lokasi:</strong> {{ $event->location }}</div>
    <div class="mb-3"><strong>Waktu Mulai:</strong> {{ $event->start_at }}</div>
    <div class="mb-3"><strong>Waktu Selesai:</strong> {{ $event->end_at ?? 'Tidak ditentukan' }}</div>
    <div class="mb-3"><strong>Deskripsi:</strong> {{ $event->description }}</div>

    <a href="{{ url('/event/'.$event->id.'/edit') }}" class="btn btn-warning">Edit</a>
    <a href="{{ url('/event') }}" class="btn btn-secondary">Kembali</a>
@endsection
