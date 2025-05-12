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
                                <img src="{{ asset('assets/images/others/author/author1.png') }}" alt="{{ $customer->name }}">
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
                        <div class="col-xl-9 col-md-8">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="nav-orders" role="tabpanel">
                                    <div class="axil-dashboard-order">
                                        <div class="table-responsive">
                                            <table class="table">
                                                <thead>
                                                    <tr>
                                                        <th scope="col">Order</th>
                                                        <th scope="col">Date</th>
                                                        <th scope="col">Status</th>
                                                        <th scope="col">Total</th>
                                                        <th scope="col">Actions</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @forelse ($orders as $row) 
                                                    <tr>
                                                        <th scope="row">{{ $row->invoice }}</th>
                                                        <td>{{ $row->created_at }}</td>
                                                        <td>{!! $row->status_label !!}</td>
                                                        <td>Rp{{ number_format($row->total) }}</td>
                                                        <td>
                                                            <div class="dropleft">
                                                                <button class="axil-btn view-btn dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                                                    Details
                                                                </button>
                                                                <ul class="dropdown-menu">
                                                                    <form action="{{ route('customer.order_accept') }}" method="post">
                                                                    @csrf
                                                                        <li><a class="dropdown-item" href="{{ route('customer.view_order', $row->invoice) }}">View</a></li>
                                                                        <input type="hidden" name="order_id" value="{{ $row->id }}">
                                                                        @if ($row->status == 3 && $row->return_count == 0)
                                                                        <li><button class="dropdown-item">Accept</button></li>
                                                                        <li><a class="dropdown-item" href="{{ route('customer.order_return', $row->invoice) }}">Return</a></li>
                                                                        @endif
                                                                    </form>
                                                                </ul>
                                                            </div>
                                                        </td>
                                                    </tr>
                                                    @empty
                                                    <tr>
                                                        <td colspan="5" class="text-center">You don't have any orders</td>
                                                    </tr>
                                                    @endforelse
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- order end -->
@endsection