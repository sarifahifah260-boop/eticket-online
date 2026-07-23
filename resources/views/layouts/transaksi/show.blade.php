@extends('layouts.app')

@section('title','Detail Transaksi')

@section('content')

<div class="container">

<h2 class="mb-4">

    Detail Transaksi

</h2>

<table class="table table-bordered">

    <tr>

        <th width="250">

            Invoice

        </th>

        <td>

            {{ $transaksi->invoice_number }}

        </td>

    </tr>

    <tr>

        <th>Nama Pembeli</th>

        <td>

            {{ $transaksi->customer_name }}

        </td>

    </tr>

    <tr>

        <th>Email</th>

        <td>

            {{ $transaksi->customer_email }}

        </td>

    </tr>

    <tr>

        <th>No HP</th>

        <td>

            {{ $transaksi->customer_phone }}

        </td>

    </tr>

    <tr>

        <th>Status</th>

        <td>

            {{ $transaksi->payment_status }}

        </td>

    </tr>

</table>

<h4 class="mt-4">

Daftar Tiket

</h4>

<table class="table table-bordered">

    <thead class="table-dark">

        <tr>

            <th>Event</th>

            <th>Tiket</th>

            <th>Harga</th>

            <th>Qty</th>

            <th>Subtotal</th>

        </tr>

    </thead>

    <tbody>

    @foreach($transaksi->transaksiTikets as $detail)

        <tr>

            <td>

                {{ $detail->tiket->event->title }}

            </td>

            <td>

                {{ $detail->tiket->name }}

            </td>

            <td>

                Rp {{ number_format($detail->price,0,',','.') }}

            </td>

            <td>

                {{ $detail->qty }}

            </td>

            <td>

                Rp {{ number_format($detail->subtotal,0,',','.') }}

            </td>

        </tr>

    @endforeach

    </tbody>

    <tfoot>

        <tr>

            <th colspan="4">

                Total

            </th>

            <th>

                Rp {{ number_format($transaksi->total_price,0,',','.') }}

            </th>

        </tr>

    </tfoot>

</table>

<a
href="{{ route('transaksi.index') }}"
class="btn btn-secondary">

Kembali

</a>

</div>

@endsection