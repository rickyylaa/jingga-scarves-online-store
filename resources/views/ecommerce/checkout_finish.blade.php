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

        <!-- invoice start -->
        <div class="axil-dashboard-address axil-section-gap">
            <div class="container">
                <div class="axil-dashboard-address">
                    <p class="notice-text">The following addresses will be used on the checkout page by default.</p>
                    <div class="row row--30">
                        <div class="col-lg-6">
                            <div class="address-info mb--40">
                                <div class="addrss-header d-flex align-items-center justify-content-between">
                                    <h4 class="title mb-0">Information Order</h4>
                                    <a href="javascript:void(0);" class="address-edit"><i class="far fa-edit"></i></a>
                                </div>
                                <ul class="address-details">
                                    <li>Invoice: {{ $order->invoice }}</li>
                                    <li>Date: {{ $order->created_at }}</li>
                                    <li class="mt--30">Subtotal: Rp{{ number_format($order->subtotal) }}</li>
                                    <li>Shipping: Rp{{ number_format($order->cost) }}</li>
                                    <li class="mt--30">Total: Rp{{ number_format($order->total) }}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="address-info">
                                <div class="addrss-header d-flex align-items-center justify-content-between">
                                    <h4 class="title mb-0">Shipping Address</h4>
                                    <a href="javascript:void(0);" class="address-edit"><i class="far fa-edit"></i></a>
                                </div>
                                <ul class="address-details">
                                    <li>Name: {{ $order->customer_name }}</li>
                                    <li>Email: {{ $order->customer->email }}</li>
                                    <li>Phone: {{ $order->customer_phone }}</li>
                                    <li class="mt--30">Address:
                                        {{ $order->customer_address }} <br>
                                        {{ $order->district->city->name }}, {{ $order->district->name }} {{ $order->district->city->postal_code }}</li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="address-info">
                                <a href="{{ route('customer.view_order', $order->invoice) }}" class="axil-btn btn-outline btn-sm">Konfirmasi Pembayaran</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- invoice end -->
@endsection