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
                            <li class="breadcrumb-item" aria-current="page">Report</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Report</h2>
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
                        <h5>Laporan Produk</h5>
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
                                <form action="{{ route('report.product') }}" method="get">
                                    <div class="dataTable-top">
                                        <div class="dataTable-dropdown">
                                            <input type="text" id="created_at" name="date" class="form-control">
                                        </div>
                                        <div class="dataTable-search">
                                            <button class="btn btn-secondary" type="submit">Filter</button>
                                            <a target="_blank" class="btn btn-primary ml-2" id="exportpdf">Export PDF</a>
                                        </div>
                                    </div>
                                </form>
                                <table class="table">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>Harga</th>
                                            <th>Quantity</th>
                                            <th>Total</th>
                                            <th>Tanggal</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @forelse ($orders as $row)
                                        <tr>
                                            <td><img src="{{ asset('storage/products/' .$row->product->image) }}" width="100px" height="100px" alt="{{ $row->name }}"> <strong>{{ $row->product->name }}</strong></td>
                                            <td>Rp {{ number_format($row->price) }}</td>
                                            <td>{{ $row->qty }} Item</td>
                                            <td>Rp {{ number_format($row->qty * $row->price) }}</td>
                                            <td>{{ $row->created_at->format('d-m-Y') }}</td>
                                        </tr>
                                        @empty
                                        <tr>
                                            <td colspan="7" class="text-center">Tidak ada data</td>
                                        </tr>
                                        @endforelse
                                    </tbody>
                                </table>
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

@section('js')
    <script type="text/javascript" src="https://cdn.jsdelivr.net/jquery/latest/jquery.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
    <link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
    <script>
        $(document).ready(function() {
            let start = moment().startOf('month')
            let end = moment().endOf('month')

            $('#exportpdf').attr('href', '/admin/reports/product/pdf/' + start.format('YYYY-MM-DD') + '+' + end.format('YYYY-MM-DD'))

            $('#created_at').daterangepicker({
                startDate: start,
                endDate: end
            }, function(first, last) {
                $('#exportpdf').attr('href', '/admin/reports/product/pdf/' + first.format('YYYY-MM-DD') + '+' + last.format('YYYY-MM-DD'))
            })
        })
    </script>
@endsection()
