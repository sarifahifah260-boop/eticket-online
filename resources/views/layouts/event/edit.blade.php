@extends('layouts.app')

@section('title', 'Edit Event')

@section('content')
    <h1>Edit Event</h1>

    <form action="{{ url('/event/'.$event->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Judul Event</label>
            <input type="text" name="title" class="form-control" value="{{ $event->title }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kategori Event</label>
            <select name="kategori_event_id" class="form-select" required>
                @foreach($kategoriEvents ?? [] as $kategori)
                    <option value="{{ $kategori->id }}" {{ $kategori->id === $event->kategori_event_id ? 'selected' : '' }}>{{ $kategori->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Lokasi</label>
            <input type="text" name="location" class="form-control" value="{{ $event->location }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Waktu Mulai</label>
            <input type="datetime-local" name="start_at" class="form-control" value="{{ optional($event->start_at)->format('Y-m-d\TH:i') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Waktu Selesai</label>
            <input type="datetime-local" name="end_at" class="form-control" value="{{ optional($event->end_at)->format('Y-m-d\TH:i') }}">
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control" rows="4">{{ $event->description }}</textarea>
        </div>

        <button type="submit" class="btn btn-primary">Perbarui</button>
    </form>
@endsection
