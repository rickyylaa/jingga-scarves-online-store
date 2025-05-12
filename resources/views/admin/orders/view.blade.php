@extends('layouts.admin.app')

@section('title')
    <title>Jingga Scarves</title>
@endsection

@section('content')
<!-- Main Content Start -->
<div class="pc-container">
    <div class="pc-content">

        <!-- Breadcrumb Start -->
        <div class="page-header">
            <div class="page-block">
                <div class="row align-items-center">
                    <div class="col-md-12">
                        <ul class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ url('admin/dashboard') }}">Home</a></li>
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Pesanan</a></li>
                            <li class="breadcrumb-item" aria-current="page">Detail pesanan</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Detail pesanan</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- [ basic-table ] start -->
            <div class="col-md-8">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5>Detail pesanan</h5>
                            <!-- TOMBOL INI HANYA TAMPIL JIKA STATUSNYA 1 DARI ORDER DAN 0 DARI PEMBAYARAN -->
                            @if ($order->status == 1 && $order->payment->status == 0)
                            <a href="{{ route('orders.approve_payment', $order->invoice) }}" class="btn btn-primary btn-sm">Terima Pembayaran</a>
                            @endif
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table">
                                <tr>
                                    <th width="30%">Nama Pelanggan</th>
                                    <td>{{ $order->customer_name }}</td>
                                </tr>
                                <tr>
                                    <th>Telp</th>
                                    <td>{{ $order->customer_phone }}</td>
                                </tr>
                                <tr>
                                    <th>Alamat</th>
                                    <td>{{ $order->customer_address }} {{ $order->customer->district->name }} - {{  $order->customer->district->city->name}}, {{ $order->customer->district->city->province->name }}</td>
                                </tr>
                                <tr>
                                    <th>Order Status</th>
                                    <td>{!! $order->status_label !!}</td>
                                </tr>
                                <!-- FORM INPUT RESI HANYA AKAN TAMPIL JIKA STATUS LEBIH BESAR 1 -->
                                @if ($order->status > 1)
                                <tr>
                                    <th>Nomor Resi</th>
                                    <td>
                                        @if ($order->status == 2)
                                        <form action="{{ route('orders.shipping') }}" method="post">
                                            @csrf
                                            <div class="input-group">
                                                <input type="hidden" name="order_id" value="{{ $order->id }}">
                                                <input type="text" name="tracking_number" placeholder="Masukkan Nomor Resi" class="form-control" required>
                                                <div class="input-group-append">
                                                    <button class="btn btn-secondary" type="submit">Kirim</button>
                                                </div>
                                            </div>
                                        </form>
                                        @else
                                        {{ $order->tracking_number }}
                                        @endif
                                    </td>
                                </tr>
                                @endif
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ basic-table ] end -->

            <!-- [ Hover-table ] start -->
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h5>Detail Pembayaran</h5>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            @if ($order->status != 0)
                            <table class="table table-hover">
                                <tr>
                                    <th width="30%">Nama Pengirim</th>
                                    <td>{{ $order->payment->name }}</td>
                                </tr>
                                <tr>
                                    <th>Bank Tujuan</th>
                                    <td>{{ $order->payment->transfer_to }}</td>
                                </tr>
                                <tr>
                                    <th>Tanggal Transfer</th>
                                    <td>{{ $order->payment->transfer_date }}</td>
                                </tr>
                                <tr>
                                    <th>Amount</th>
                                    <td>Rp{{ number_format($order->payment->amount) }}</td>
                                </tr>
                                <tr>
                                    <th>Shipping</th>
                                    <td>{{ ($order->courier) }}</td>
                                </tr>
                                <tr>
                                    <th>Bukti Pembayaran</th>
                                    <td><a target="_blank" href="{{ asset('storage/payment/' . $order->payment->proof) }}">Lihat</a></td>
                                </tr>
                                <tr>
                                    <th>Status</th>
                                    <td>{!! $order->payment->status_label !!}</td>
                                </tr>
                            </table>
                            @else
                            <h5 class="text-center">Belum Konfirmasi Pembayaran</h5>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Hover-table ] end -->

            <!-- [ Hover-table ] start -->
            <div class="col-md-12">
                <div class="card">
                    <div class="card-header">
                        <h5>Detail Produk</h5>
                    </div>
                    <div class="card-body table-border-style">
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <tr>
                                    <th>Produk</th>
                                    <th>Quantity</th>
                                    <th>Harga</th>
                                    <th>Berat</th>
                                    <th>Subtotal</th>
                                </tr>
                                @foreach ($order->details as $row)
                                <tr>
                                    <td>{{ $row->product->name }}</td>
                                    <td>{{ $row->qty }}</td>
                                    <td>Rp {{ number_format($row->price) }}</td>
                                    <td>{{ $row->weight }} gr</td>
                                    <td>Rp {{ number_format($row->qty * $row->price) }}</td>
                                </tr>
                                @endforeach
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- [ Hover-table ] end -->

        </div>
    </div>
</div>
<!--  Main Content End -->
@endsection
