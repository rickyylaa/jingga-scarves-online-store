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

        <!-- account start -->
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
                                        <a class="nav-item nav-link active" data-bs-toggle="tab" href="#nav-dashboard" role="tab" aria-selected="true"><i class="fas fa-th-large"></i>Dashboard</a>
                                        <a class="nav-item nav-link" href="{{ route('customer.orders') }}"><i class="fas fa-shopping-basket"></i>Orders</a>
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
                        <div class="col-xl-9 col-md-8">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="nav-dashboard" role="tabpanel">
                                    <div class="axil-dashboard-overview">
                                        <div class="welcome-text">Hello {{ $customer->name }} </div>
                                        <p>From your account dashboard you can view your recent orders, manage your shipping and billing addresses, and edit your password and account details.</p>
                                        <br><br>
                                        <div class="row">
                                            <!-- My Account Tab Content Start -->
                                            <div class="col-lg-3 col-md-3">
                                                <div class="tab-content" id="myaccountContent">
                                                    <!-- Single Tab Content Start -->
                                                    <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                                        <div class="myaccount-content">
                                                            <div class="myaccount-table table-responsive text-center">
                                                                <table class="table table-bordered">
                                                                    <thead class="thead-light">
                                                                    <tr>
                                                                        <th>Belum Dibayar</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <tr>
                                                                        <td>Rp{{ number_format($orders[0]->pending) }}</td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Single Tab Content End -->
                                                </div>
                                            </div> <!-- My Account Tab Content End -->

                                            <!-- My Account Tab Content Start -->
                                            <div class="col-lg-3 col-md-3">
                                                <div class="tab-content" id="myaccountContent">
                                                    <!-- Single Tab Content Start -->
                                                    <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                                        <div class="myaccount-content">
                                                            <div class="myaccount-table table-responsive text-center">
                                                                <table class="table table-bordered">
                                                                    <thead class="thead-light">
                                                                    <tr>
                                                                        <th>Diproses</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <tr>
                                                                        <td>{{ $orders[0]->processOrder }} Pesanan</td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Single Tab Content End -->
                                                </div>
                                            </div> <!-- My Account Tab Content End -->

                                            <!-- My Account Tab Content Start -->
                                            <div class="col-lg-3 col-md-3">
                                                <div class="tab-content" id="myaccountContent">
                                                    <!-- Single Tab Content Start -->
                                                    <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                                        <div class="myaccount-content">
                                                            <div class="myaccount-table table-responsive text-center">
                                                                <table class="table table-bordered">
                                                                    <thead class="thead-light">
                                                                    <tr>
                                                                        <th>Dikirim</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <tr>
                                                                        <td>{{ $orders[0]->shipping }} Pesanan</td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Single Tab Content End -->
                                                </div>
                                            </div> <!-- My Account Tab Content End -->

                                            <!-- My Account Tab Content Start -->
                                            <div class="col-lg-3 col-md-3">
                                                <div class="tab-content" id="myaccountContent">
                                                    <!-- Single Tab Content Start -->
                                                    <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                                                        <div class="myaccount-content">
                                                            <div class="myaccount-table table-responsive text-center">
                                                                <table class="table table-bordered">
                                                                    <thead class="thead-light">
                                                                    <tr>
                                                                        <th>Selesai</th>
                                                                    </tr>
                                                                    </thead>
                                                                    <tbody>
                                                                    <tr>
                                                                        <td>{{ $orders[0]->completeOrder }} Pesanan</td>
                                                                    </tr>
                                                                    </tbody>
                                                                </table>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <!-- Single Tab Content End -->
                                                </div>
                                            </div> <!-- My Account Tab Content End -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- account end -->
@endsection