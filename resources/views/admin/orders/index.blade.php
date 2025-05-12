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
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Misc</a></li>
                            <li class="breadcrumb-item" aria-current="page">Pesanan</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Pesanan</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- [ Main Content ] start -->
        <div class="row">
            <!-- Extra small table start-->
            <div class="col-sm-12">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5>Pesanan</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif

                            @if (session('error'))
                                <div class="alert alert-danger">{{ session('error') }}</div>
                            @endif
                            <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                                <form action="{{ route('orders.index') }}" method="get">
                                    <div class="dataTable-top">
                                        <div class="dataTable-dropdown">
                                            <label>
                                                <select class="dataTable-selector">
                                                    <option value="">Status</option>
                                                    <option value="0">Baru</option>
                                                    <option value="1">Confirm</option>
                                                    <option value="2">Proses</option>
                                                    <option value="3">Dikirim</option>
                                                    <option value="4">Selesai</option>
                                                </select>
                                                <input type="text" name="q" class="form-control" placeholder="Cari..." value="{{ request()->q }}">
                                            </label>
                                        </div>
                                        <div class="dataTable-search">
                                            <button class="btn btn-primary" type="submit">Cari</button>
                                        </div>
                                    </div>
                                </form>
                                <div class="dataTable-container">
                                    <table class="table">
                                        <thead>
                                            <tr>
                                                <th>InvoiceID</th>
                                                <th>Pelanggan</th>
                                                <th>Subtotal</th>
                                                <th>Tanggal</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @if(!empty($orders) && $orders->count())
                                            @foreach($orders as $key => $row)

                                            <tr>
                                                <td><strong>{{ $row->invoice }}</strong></td>
                                                <td><strong>{{ $row->customer_name }}</strong><br>
                                                    <label><strong>Telp:</strong> {{ $row->customer_phone }}</label><br>
                                                    <label><strong>Alamat:</strong> {{ $row->customer_address }} {{ $row->customer->district->name }} - {{  $row->customer->district->city->name}}, {{ $row->customer->district->city->province->name }}</label>
                                                </td>
                                                <td>Rp {{ number_format($row->subtotal) }}</td>
                                                <td>{{ $row->created_at->format('d-m-Y') }}</td>
                                                <td>{!! $row->sts_label !!}</td>
                                                <td>
                                                    <div class="dropdown">
                                                        <a class="avtar avtar-s btn-link-secondary dropdown-toggle arrow-none" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            <i class="ti ti-dots-vertical f-18"></i>
                                                        </a>
                                                        <div class="dropdown-menu dropdown-menu-end">
                                                            <form action="{{ route('orders.destroy', $row->id) }}" method="post">
                                                            @csrf
                                                                @method('DELETE')
                                                                <a href="{{ route('orders.view', $row->invoice) }}" class="dropdown-item"><i class='bx bx-show'></i>Lihat</a>
                                                                <button class="dropdown-item"><i class="bx bx-trash me-1"></i> Hapus</button>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </td>
                                            </tr>

                                            @endforeach

                                            @else

                                            <tr>
                                                <td colspan="6" class="text-center">No data available in table</td>
                                            </tr>

                                            @endif

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Extra small table start-->
        </div>
        <!-- [ Main Content ] end -->

        <!--  Main Content End -->
    </div>
</div>
<!--  Main Content End -->
@endsection
