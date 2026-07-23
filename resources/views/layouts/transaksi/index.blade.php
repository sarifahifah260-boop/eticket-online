@extends('layouts.app')

@section('title','Daftar Transaksi')

@section('content')

<div class="container">

    <div class="d-flex justify-content-between align-items-center mb-3">

        <h2>Daftar Transaksi</h2>

        <a href="{{ route('transaksi.create') }}"
            class="btn btn-primary">

            Tambah Transaksi

        </a>

    </div>

    @if(session('success'))

        <div class="alert alert-success">

            {{ session('success') }}

        </div>

    @endif

    <table class="table table-bordered table-striped">

        <thead class="table-dark">

            <tr>

                <th>No</th>

                <th>Invoice</th>

                <th>Nama</th>

                <th>Email</th>

                <th>No HP</th>

                <th>Total</th>

                <th>Status</th>

                <th width="180">Aksi</th>

            </tr>

        </thead>

        <tbody>

        @forelse($transaksis as $transaksi)

            <tr>

                <td>{{ $loop->iteration }}</td>

                <td>{{ $transaksi->invoice_number }}</td>

                <td>{{ $transaksi->customer_name }}</td>

                <td>{{ $transaksi->customer_email }}</td>

                <td>{{ $transaksi->customer_phone }}</td>

                <td>

                    Rp {{ number_format($transaksi->total_price,0,',','.') }}

                </td>

                <td>

                    @if($transaksi->payment_status=="Paid")

                        <span class="badge bg-success">

                            Paid

                        </span>

                    @elseif($transaksi->payment_status=="Pending")

                        <span class="badge bg-warning">

                            Pending

                        </span>

                    @else

                        <span class="badge bg-danger">

                            Cancelled

                        </span>

                    @endif

                </td>

                <td>

                    <a
                        href="{{ route('transaksi.show',$transaksi->id) }}"
                        class="btn btn-secondary btn-sm">

                        Detail

                    </a>

                    <form
                        action="{{ route('transaksi.destroy',$transaksi->id) }}"
                        method="POST"
                        class="d-inline">

                        @csrf
                        @method('DELETE')

                        <button
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Hapus transaksi?')">

                            Hapus

                        </button>

                    </form>

                </td>

            </tr>

        @empty

            <tr>

                <td colspan="8" class="text-center">

                    Belum ada transaksi.

                </td>

            </tr>

        @endforelse

        </tbody>

    </table>

</div>

@endsection