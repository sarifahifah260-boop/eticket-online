@extends('layouts.app')

@section('title', 'Detail Kategori')

@section('content')

<h1>Detail Kategori</h1>

<div class="card">

    <div class="card-body">

        <div class="mb-3">
            <strong>Nama :</strong>
            {{ $kategori->name }}
        </div>

        <div class="mb-3">
            <strong>Deskripsi :</strong>
            {{ $kategori->description }}
        </div>

        <a href="{{ route('kategori.edit',$kategori->id) }}" class="btn btn-warning">
            Edit
        </a>

        <a href="{{ route('kategori.index') }}" class="btn btn-secondary">
            Kembali
        </a>

    </div>

</div>

@endsection