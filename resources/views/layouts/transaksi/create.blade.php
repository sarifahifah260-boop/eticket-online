@extends('layouts.app')

@section('title','Tambah Transaksi')

@section('content')

<div class="container">

    <h2 class="mb-4">Pembelian Tiket</h2>

    @if ($errors->any())
        <div class="alert alert-danger">

            <ul class="mb-0">

                @foreach($errors->all() as $error)

                    <li>{{ $error }}</li>

                @endforeach

            </ul>

        </div>
    @endif

    <form action="{{ route('transaksi.store') }}" method="POST">

        @csrf

        <div class="card mb-3">

            <div class="card-header">
                Data Pembeli
            </div>

            <div class="card-body">

                <div class="mb-3">

                    <label>Nama Pembeli</label>

                    <input
                        type="text"
                        name="customer_name"
                        class="form-control"
                        required>

                </div>

                <div class="mb-3">

                    <label>Email</label>

                    <input
                        type="email"
                        name="customer_email"
                        class="form-control"
                        required>

                </div>

                <div class="mb-3">

                    <label>No HP</label>

                    <input
                        type="text"
                        name="customer_phone"
                        class="form-control"
                        required>

                </div>

            </div>

        </div>

        <div class="card">

            <div class="card-header d-flex justify-content-between">

                <span>Daftar Tiket</span>

                <button
                    type="button"
                    class="btn btn-success btn-sm"
                    id="addRow">

                    + Tambah Tiket

                </button>

            </div>

            <div class="card-body">

                <table class="table table-bordered" id="ticketTable">

                    <thead>

                        <tr>

                            <th width="50%">Tiket</th>

                            <th width="20%">Qty</th>

                            <th width="15%">Hapus</th>

                        </tr>

                    </thead>

                    <tbody>

                        <tr>

                            <td>

                                <select
                                    name="ticket[0][tiket_id]"
                                    class="form-control"
                                    required>

                                    <option value="">

                                        -- Pilih Tiket --

                                    </option>

                                    @foreach($tikets as $tiket)

                                        <option value="{{ $tiket->id }}">

                                            {{ $tiket->event->title }}

                                            -

                                            {{ $tiket->name }}

                                            -

                                            Rp {{ number_format($tiket->price,0,',','.') }}

                                            -

                                            Sisa {{ $tiket->remaining_quota }}

                                        </option>

                                    @endforeach

                                </select>

                            </td>

                            <td>

                                <input
                                    type="number"
                                    name="ticket[0][qty]"
                                    class="form-control"
                                    min="1"
                                    required>

                            </td>

                            <td class="text-center">

                                -

                            </td>

                        </tr>

                    </tbody>

                </table>

            </div>

        </div>

        <br>

        <button class="btn btn-primary">

            Simpan Transaksi

        </button>

        <a href="{{ route('transaksi.index') }}"
            class="btn btn-secondary">

            Kembali

        </a>

    </form>

</div>

<script>

let index = 1;

document.getElementById('addRow').onclick = function(){

    let html = `

    <tr>

        <td>

            <select
                name="ticket[${index}][tiket_id]"
                class="form-control"
                required>

                <option value="">-- Pilih Tiket --</option>

                @foreach($tikets as $tiket)

                    <option value="{{ $tiket->id }}">

                        {{ $tiket->event->title }}

                        -

                        {{ $tiket->name }}

                        -

                        Rp {{ number_format($tiket->price,0,',','.') }}

                        -

                        Sisa {{ $tiket->remaining_quota }}

                    </option>

                @endforeach

            </select>

        </td>

        <td>

            <input
                type="number"
                name="ticket[${index}][qty]"
                class="form-control"
                min="1"
                required>

        </td>

        <td>

            <button
                type="button"
                class="btn btn-danger btn-sm remove">

                Hapus

            </button>

        </td>

    </tr>

    `;

    document.querySelector("#ticketTable tbody")
        .insertAdjacentHTML("beforeend",html);

    index++;

};

document.addEventListener("click",function(e){

    if(e.target.classList.contains("remove")){

        e.target.closest("tr").remove();

    }

});

</script>

@endsection