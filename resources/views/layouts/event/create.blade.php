@extends('layouts.app')

@section('title', 'Buat Event')

@section('content')
    <h1>Buat Event</h1>

    <form action="{{ url('/event') }}" method="POST">
        @csrf

        <div class="mb-3">
            <label class="form-label">Judul Event</label>
            <input type="text" name="title" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kategori Event</label>
            <select name="kategori_event_id" class="form-select" required>
                @foreach($kategoriEvents ?? [] as $kategori)
                    <option value="{{ $kategori->id }}">{{ $kategori->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Lokasi</label>
            <input type="text" name="location" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Waktu Mulai</label>
            <input type="datetime-local" name="start_at" class="form-control" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Waktu Selesai</label>
            <input type="datetime-local" name="end_at" class="form-control">
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>
            <textarea name="description" class="form-control" rows="4"></textarea>
        </div>

        <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
@endsection
