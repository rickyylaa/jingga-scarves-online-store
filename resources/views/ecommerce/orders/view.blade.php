@extends('layouts.ecommerce.app')

@section('title')
<title>Jingga Scarves</title>
@endsection

@section('content')
<!-- End Mainmenu Area -->
        <div class="header-top-campaign">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-5 col-lg-6 col-md-10">
                        <div class="header-campaign-activation axil-slick-arrow arrow-both-side header-campaign-arrow">
                        </div>
                    </div>
                </div>
            </div>
        </div>
        </header>
        <!-- End Header -->

        <!-- order start -->
        <div class="axil-dashboard-area axil-section-gap">
            <div class="container">
                <div class="axil-dashboard-warp">
                    <div class="axil-dashboard-author">
                        <div class="media">
                            <div class="thumbnail">
                                <img src="{{ asset('assets/images/others/author/author1.png') }}" alt="Hello Annie">
                            </div>
                            <div class="media-body">
                                <h5 class="title mb-0">Hello {{ $customer->name }}, <p><a href="/">Back to home</a></p></h5>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-xl-3 col-md-4">
                            <aside class="axil-dashboard-aside">
                                <nav class="axil-dashboard-nav">
                                    <div class="nav nav-tabs" role="tablist">
                                        <a class="nav-item nav-link" href="{{ route('customer.account') }}"><i class="fas fa-th-large"></i>Dashboard</a>
                                        <a class="nav-item nav-link active" data-bs-toggle="tab" href="#nav-orders" role="tab" aria-selected="true"><i class="fas fa-shopping-basket"></i>Orders</a>
                                        <a class="nav-item nav-link" href="{{ route('customer.setting') }}"><i class="fas fa-user"></i>Account Details</a>
                                        <a class="nav-item nav-link" href="{{ route('front.product') }}"><i class="fas fa-box"></i>Product</a>
                                        <a class="nav-item nav-link" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                            <i class="fal fa-sign-out"></i>Logout
                                        </a>
                                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                            @csrf
                                        </form>
                                    </div>
                                </nav>
                            </aside>
                        </div>
                        <div class="col-xl-5 col-md-4">
                            <aside class="axil-dashboard-aside">
                                <nav class="axil-dashboard-nav">
                                    <h5>Information
                                    <p><a href="{{ route('customer.orders') }}">Back</a></p>
                                    </h5>
                                    <div class="nav nav-tabs" role="tablist">
                                        <span class="nav-item nav-link">Invoice ID: <a href="{{ route('customer.order_pdf', $order->invoice) }}" target="_blank"><strong>{{ $order->invoice }}</strong></a></span>
                                        <span class="nav-item nav-link">Name: <strong>{{ $order->customer_name }}</strong></span>
                                        <span class="nav-item nav-link">Phone: <strong>{{ $order->customer_phone }}</strong></span>
                                        <span class="nav-item nav-link">Address: <strong>{{ $order->customer_address }}, {{ $order->district->name }}, {{ $order->district->city->name }} {{ $order->district->city->postal_code }}</strong></span>
                                    </div>
                                </nav>
                            </aside>
                        </div>
                        <div class="col-xl-4 col-md-4">
                            <aside class="axil-dashboard-aside">
                                <nav class="axil-dashboard-nav">
                                    <h5>Payment
                                        @if ($order->status == 0)
                                        | <a href="{{ url('customer/payment?invoice=' . $order->invoice) }}">Konfirmasi</a>
                                        @endif
                                    </h5>
                                    <div class="nav nav-tabs" role="tablist">
                                        @if ($order->payment)
                                        <span class="nav-item nav-link">Shipper: <strong>{{ $order->payment->name }}</strong></a></span>
                                        <span class="nav-item nav-link">Date: <strong>{{ $order->payment->transfer_date }}</strong></span>
                                        <span class="nav-item nav-link">Amount: <strong>Rp{{ number_format($order->payment->amount) }}</strong></span>
                                        <span class="nav-item nav-link">Bank: <strong>{{ $order->payment->transfer_to }}</strong></span>
                                        <span class="nav-item nav-link">Proof: <strong><img src="{{ asset('storage/payment/' . $order->payment->proof) }}" width="50px" height="50px" alt="">
                                            <a href="{{ asset('storage/payment/' . $order->payment->proof) }}" target="_blank">Lihat Detail</a></strong></span>
                                        @else
                                        <span class="nav-item nav-link"><strong>There is no payment data yet</strong></a></span>
                                        @endif
                                    </div>
                                </nav>
                            </aside>
                        </div>
                        <div class="col-xl-12 col-md-12 pt-4">
                            <aside class="axil-dashboard-aside">
                                <div class="axil-dashboard-order">
                                    <div class="table-responsive">
                                        <table class="table">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Product</th>
                                                    <th scope="col">Price</th>
                                                    <th scope="col">Quantity</th>
                                                    <th scope="col">Weight</th>
                                                    <th scope="col">Subtotal</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @forelse ($order->details as $row)
                                                <tr>
                                                    <td scope="row">{{ $row->product->name }}</td>
                                                    <td>Rp{{ number_format($row->price) }}</td>
                                                    <td>{{ $row->qty }} Item</td>
                                                    <td>{{ $row->weight }} gr</td>
                                                    <td>Rp{{ number_format($row['price'] * $row['qty']) }}</td>
                                                </tr>
                                                @empty
                                                <tr>
                                                    <td colspan="4" class="text-center">There is no order data yet</td>
                                                </tr>
                                                @endforelse
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </aside>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- order end -->
@endsection