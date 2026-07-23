@extends('layouts.app')

@section('title', 'Edit Tiket')

@section('content')

<div class="container">

    <h2 class="mb-4">Edit Tiket</h2>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul class="mb-0">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('tiket.update', $tiket->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Event</label>

            <select name="event_id" class="form-control" required>

                @foreach($events as $event)

                    <option value="{{ $event->id }}"
                        {{ $event->id == $tiket->event_id ? 'selected' : '' }}>

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
                value="{{ old('name', $tiket->name) }}"
                required>
        </div>

        <div class="mb-3">
            <label class="form-label">Harga</label>

            <input
                type="number"
                name="price"
                class="form-control"
                value="{{ old('price', $tiket->price) }}"
                required>
        </div>

        <div class="mb-3">
            <label class="form-label">Kuota</label>

            <input
                type="number"
                name="quota"
                class="form-control"
                value="{{ old('quota', $tiket->quota) }}"
                required>
        </div>

        <div class="mb-3">
            <label class="form-label">Deskripsi</label>

            <textarea
                name="description"
                rows="4"
                class="form-control">{{ old('description', $tiket->description) }}</textarea>
        </div>

        <button class="btn btn-primary">
            Update
        </button>

        <a href="{{ route('tiket.index') }}" class="btn btn-secondary">
            Kembali
        </a>

    </form>

</div>

@endsection