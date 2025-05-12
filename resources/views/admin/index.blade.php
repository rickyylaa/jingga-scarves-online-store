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
                            <li class="breadcrumb-item"><a href="javascript: void(0)">Navigation</a></li>
                            <li class="breadcrumb-item" aria-current="page">Dashboard</li>
                        </ul>
                    </div>
                    <div class="col-md-12">
                        <div class="page-header-title">
                            <h2 class="mb-0">Dashboard</h2>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Breadcrumb End -->

        <!-- [ Main Content ] start -->
        <div class="row">
            <div class="col-md-6 col-xl-3">
                <div class="card social-widget-card bg-primary">
                    <div class="card-body">
                        <h3 class="text-white m-0">{{ $customers->count() }}</h3>
                        <span class="m-t-10">Pelanggan</span>
                        <i class="fas fa-user-plus"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card social-widget-card bg-info">
                    <div class="card-body">
                        <h3 class="text-white m-0">{{ $orders[0]->newOrder }}</h3>
                        <span class="m-t-10">Orderan Baru</span>
                        <i class="fas fa-cart-plus"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card social-widget-card bg-dark">
                    <div class="card-body">
                        <h3 class="text-white m-0">{{ $orders[0]->shipping }}</h3>
                        <span class="m-t-10">Dikirim</span>
                        <i class="fas fa-shipping-fast"></i>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-xl-3">
                <div class="card social-widget-card bg-danger">
                    <div class="card-body">
                        <h3 class="text-white m-0">{{ $products->count() }}</h3>
                        <span class="m-t-10">Total Product</span>
                        <i class="fas fa-shopping-bag"></i>
                    </div>
                </div>
            </div>


            <!-- Extra small table start-->
            <div class="col-sm-9">
                <div class="card">
                    <div class="card-header d-flex align-items-center justify-content-between">
                        <h5>Omset Harian</h5>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <div class="dataTable-wrapper dataTable-loading no-footer sortable searchable fixed-columns">
                                <div class="dataTable-container">
                                    <table class="table dataTable-table" id="pc-dt-simple">
                                        <thead>
                                            <tr>
                                                <th>#</th>
                                                <th>Tanggal</th>
                                                <th>Omset</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @php $total = 0; @endphp
                                            @if(!empty($order) && $order->count())
                                            @foreach($order as $key => $row)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{ $row->created_at }}</td>
                                                <td>Rp {{ number_format($row->total) }}</td>
                                                <td></td>
                                            </tr>
                                            @php $total += $row->total @endphp
                                            @endforeach
                                            @else
                                            <tr>
                                                <td colspan="6" class="text-center">No data available in table</td>
                                            </tr>
                                            @endif
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                <td colspan="2">Total:</td>
                                                <td>Rp {{ number_format($total) }}</td>
                                                <td></td>
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            
            <div class="col-sm-3">
                <div class="card">
                    <div class="card-body pb-0">
                        <div class="d-flex align-items-center justify-content-between mb-3">
                            <h5 class="mb-0">Payment History</h5>
                            <a class="avtar avtar-s btn-link-secondary">
                            <i class="ti ti-plus f-18"></i>
                            </a>
                        </div>
                    </div>
                    <ul class="list-group list-group-flush border-top-0">
                        <li class="list-group-item">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="avtar avtar-s bg-light-secondary">
                                        <img src="{{ asset('dist/images/widget/bca-logo.jpg') }}" alt="img" class="img-fluid" />
                                    </div>
                                </div>
                                <div class="flex-grow-1 mx-2">
                                    <p class="mb-1">BCA</p>
                                    <h6 class="mb-0">+210.000 <small class="text-success">+ 30.6%</small></h6>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="dropdown">
                                        <a class="avtar avtar-s btn-link-secondary dropdown-toggle arrow-none" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ti ti-dots-vertical f-18"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Name</a>
                                            <a class="dropdown-item" href="#">Date</a>
                                            <a class="dropdown-item" href="#">Ratting</a>
                                            <a class="dropdown-item" href="#">Unread</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                        <li class="list-group-item">
                            <div class="d-flex align-items-center">
                                <div class="flex-shrink-0">
                                    <div class="avtar avtar-s bg-light-secondary">
                                    <img src="{{ asset('dist/images/widget/bri-logo.jpg') }}" alt="img" class="img-fluid" />
                                    </div>
                                </div>
                                <div class="flex-grow-1 mx-2">
                                    <p class="mb-1">BRI</p>
                                    <h6 class="mb-0">-200.000 <small class="text-danger">- 30.6%</small></h6>
                                </div>
                                <div class="flex-shrink-0">
                                    <div class="dropdown">
                                        <a class="avtar avtar-s btn-link-secondary dropdown-toggle arrow-none" href="#" data-bs-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                            <i class="ti ti-dots-vertical f-18"></i>
                                        </a>
                                        <div class="dropdown-menu dropdown-menu-end">
                                            <a class="dropdown-item" href="#">Name</a>
                                            <a class="dropdown-item" href="#">Date</a>
                                            <a class="dropdown-item" href="#">Ratting</a>
                                            <a class="dropdown-item" href="#">Unread</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </li>
                    </ul>
                    <div class="card-footer">
                        <div class="d-grid">
                            <button class="btn btn-outline-secondary">View all</button>
                        </div>
                    </div>
                </div>
            <!-- Extra small table start-->
            </div>
        </div>
        <!-- [ Main Content ] end -->
    </div>
</div>
<!-- [ Main Content ] end -->
@endsection