@extends('layouts.app')

@section('title','Detail E-Ticket')

@section('content')

<div class="container">

    <div class="card shadow">

        <div class="card-header bg-primary text-white">

            <h3>E-Ticket</h3>

        </div>

        <div class="card-body">

            <h4 class="text-center">
                {{ $eticket->ticket_code }}
            </h4>

            <hr>

            <div class="text-center mb-4">

                <img
                    src="{{ asset('storage/qrcodes/'.$eticket->qr_code) }}"
                    width="250"
                    class="img-thumbnail">

            </div>

            <p>
                <strong>Invoice :</strong>
                {{ $eticket->transaksi->invoice_number }}
            </p>

            <p>
                <strong>Nama Pembeli :</strong>
                {{ $eticket->transaksi->customer_name }}
            </p>

            <p>
                <strong>Email :</strong>
                {{ $eticket->transaksi->customer_email }}
            </p>

            <p>
                <strong>No HP :</strong>
                {{ $eticket->transaksi->customer_phone }}
            </p>

            <hr>

            <h5>Tiket yang Dibeli</h5>

            <table class="table table-bordered">

                <thead>

                    <tr>

                        <th>Event</th>

                        <th>Tiket</th>

                        <th>Qty</th>

                        <th>Harga</th>

                        <th>Subtotal</th>

                    </tr>

                </thead>

                <tbody>

                    @foreach($eticket->transaksi->transaksiTikets as $detail)

                    <tr>

                        <td>

                            {{ $detail->tiket->event->title }}

                        </td>

                        <td>

                            {{ $detail->tiket->name }}

                        </td>

                        <td>

                            {{ $detail->qty }}

                        </td>

                        <td>

                            Rp {{ number_format($detail->price,0,',','.') }}

                        </td>

                        <td>

                            Rp {{ number_format($detail->subtotal,0,',','.') }}

                        </td>

                    </tr>

                    @endforeach

                </tbody>

            </table>

            <h4 class="text-end">

                Total :

                Rp {{ number_format($eticket->transaksi->total_price,0,',','.') }}

            </h4>

            <a href="{{ route('eticket.index') }}"
                class="btn btn-secondary">

                Kembali

            </a>

        </div>

    </div>

</div>

@endsection