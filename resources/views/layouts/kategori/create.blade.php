@extends('layouts.app')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-7">

            <div class="card shadow-lg border-0 rounded-4">
                <div class="card-header bg-primary text-white text-center py-3 rounded-top-4">
                    <h3 class="mb-0">Tambah Kategori</h3>
                </div>

                <div class="card-body p-4">

                    <form action="{{ route('kategori.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="name" class="form-label fw-bold">
                                Nama Kategori
                            </label>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                class="form-control rounded-3"
                                value="{{ old('name') }}"
                                placeholder="Masukkan nama kategori"
                                required>
                        </div>

                        <div class="mb-4">
                            <label for="description" class="form-label fw-bold">
                                Deskripsi
                            </label>
                            <textarea
                                name="description"
                                id="description"
                                rows="4"
                                class="form-control rounded-3"
                                placeholder="Masukkan deskripsi kategori">{{ old('description') }}</textarea>
                        </div>

                        <div class="d-flex justify-content-end">
                            <a href="{{ route('kategori.index') }}" class="btn btn-secondary me-2">
                                Batal
                            </a>

                            <button type="submit" class="btn btn-primary px-4">
                                Simpan
                            </button>
                        </div>
                        @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul class="mb-0">
                                @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                        @endif
                    </form>

                </div>
            </div>

        </div>
    </div>
</div>
@endsection