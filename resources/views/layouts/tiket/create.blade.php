@extends('layouts.app')

@section('title', 'Tambah Tiket')

@section('content')

<div class="container">

    <h2 class="mb-4">Tambah Tiket</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tiket.store') }}" method="POST">

        @csrf

        <div class="mb-3">
            <label class="form-label">Event</label>

            <select name="event_id" class="form-control" required>

                <option value="">-- Pilih Event --</option>

                @foreach($events as $event)

                    <option value="{{ $event->id }}">

                        {{ $event->title }}

                    </option>

                @endforeach

            </select>

        </div>

        <div class="mb-3">

            <label class="form-label">Nama Tiket</label>

            <input
                type="text"
                name="name"
                class="form-control"
                value="{{ old('name') }}"
                required>

        </div>

        <div class="mb-3">

            <label class="form-label">Harga</label>

            <input
                type="number"
                name="price"
                class="form-control"
                value="{{ old('price') }}"
                min="0"
                required>

        </div>

        <div class="mb-3">

            <label class="form-label">Kuota</label>

            <input
                type="number"
                name="quota"
                class="form-control"
                value="{{ old('quota') }}"
                min="1"
                required>

        </div>

        <div class="mb-3">

            <label class="form-label">Deskripsi</label>

            <textarea
                name="description"
                rows="4"
                class="form-control">{{ old('description') }}</textarea>

        </div>

        <button class="btn btn-primary">

            Simpan

        </button>

        <a href="{{ route('tiket.index') }}" class="btn btn-secondary">

            Kembali

        </a>

    </form>

</div>

@endsection