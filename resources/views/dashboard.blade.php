@extends('layouts.app')

@section('title','Dashboard')

@section('content')

<div class="container">

    <h2 class="mb-4">
        Dashboard E-Ticket Online
    </h2>

    <div class="row">

        <div class="col-md-3">

            <div class="card text-white bg-primary mb-3">

                <div class="card-body">

                    <h5>Kategori</h5>

                    <h2>{{ $jumlahKategori }}</h2>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card text-white bg-success mb-3">

                <div class="card-body">

                    <h5>Event</h5>

                    <h2>{{ $jumlahEvent }}</h2>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card text-white bg-warning mb-3">

                <div class="card-body">

                    <h5>Tiket</h5>

                    <h2>{{ $jumlahTiket }}</h2>

                </div>

            </div>

        </div>

        <div class="col-md-3">

            <div class="card text-white bg-danger mb-3">

                <div class="card-body">

                    <h5>Transaksi</h5>

                    <h2>{{ $jumlahTransaksi }}</h2>

                </div>

            </div>

        </div>

    </div>

    <div class="card">

        <div class="card-body">

            <h4>Total Pendapatan</h4>

            <h2 class="text-success">

                Rp {{ number_format($totalPendapatan,0,',','.') }}

            </h2>

        </div>

    </div>

</div>

@endsection