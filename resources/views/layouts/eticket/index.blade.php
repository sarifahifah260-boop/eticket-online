@extends('layouts.app')

@section('title','Daftar E-Ticket')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-4">

        <h2>Daftar E-Ticket</h2>

    </div>

    @if(session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    <table class="table table-bordered table-hover">

        <thead class="table-dark">

            <tr>

                <th>No</th>

                <th>Kode Ticket</th>

                <th>Invoice</th>

                <th>Nama Pembeli</th>

                <th>Status</th>

                <th>Aksi</th>

            </tr>

        </thead>

        <tbody>

        @forelse($etickets as $eticket)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>

                    <strong>{{ $eticket->ticket_code }}</strong>

                </td>

                <td>

                    {{ $eticket->transaksi->invoice_number }}

                </td>

                <td>

                    {{ $eticket->transaksi->customer_name }}

                </td>

                <td>

                    @if($eticket->is_used)

                        <span class="badge bg-success">

                            Sudah Digunakan

                        </span>

                    @else

                        <span class="badge bg-warning text-dark">

                            Belum Digunakan

                        </span>

                    @endif

                </td>

                <td>

                    <a href="{{ route('eticket.show',$eticket->id) }}"
                        class="btn btn-primary btn-sm">

                        Detail

                    </a>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="6" class="text-center">

                    Belum ada E-Ticket.

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection