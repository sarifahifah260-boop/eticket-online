@extends('layouts.app')

@section('title', 'Edit Kategori')

@section('content')

<div class="container">

    <h1>Edit Kategori</h1>

    <form action="{{ route('kategori.update', $kategori->id) }}" method="POST">

        @csrf
        @method('PUT')

        <div class="mb-3">

            <label class="form-label">
                Nama Kategori
            </label>

            <input
                type="text"
                name="name"
                class="form-control"
                value="{{ old('name', $kategori->name) }}"
                required>

        </div>

        <div class="mb-3">

            <label class="form-label">
                Deskripsi
            </label>

            <textarea
                name="description"
                class="form-control"
                rows="4">{{ old('description', $kategori->description) }}</textarea>

        </div>

        <button class="btn btn-primary">

            Perbarui

        </button>

        <a href="{{ route('kategori.index') }}"
            class="btn btn-secondary">

            Kembali

        </a>

    </form>

</div>

@endsection