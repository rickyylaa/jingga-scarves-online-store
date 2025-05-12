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

        <!-- payment start -->
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
                        <div class="col-xl-9 col-md-8">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="nav-orders" role="tabpanel">
                                    <div class="axil-dashboard-account">
                                        <form class="account-details-form" action="{{ route('customer.return', $order->id) }}" enctype="multipart/form-data" method="post">
                                            @csrf
                                            <input type="hidden" name="_method" value="PUT">
                                            <div class="row">
                                                <h5 class="title">Password Change -
                                                    <a href="{{ route('customer.orders') }}">Back</a>
                                                </h5>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Reason <span style="color: red">*</span></label>
                                                        <textarea class="form-control" name="reason" cols="5" rows="5" required></textarea>
                                                        <p class="text-danger">{{ $errors->first('reason') }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Refund Transfer <span style="color: red">*</span></label>
                                                        <input type="text" class="form-control" name="refund_transfer" placeholder="Refund Transfer" required>
                                                        <p class="text-danger">{{ $errors->first('refund_transfer') }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Proof <span style="color: red">*</span></label>
                                                        <input type="file" class="form-control" name="photo" required>
                                                        <p class="text-danger">{{ $errors->first('photo') }}</p>
                                                    </div>
                                                </div>
                                                <div class="form-group mb--0">
                                                    <input type="submit" class="axil-btn" value="Submit">
                                                    <a href="{{ route('customer.orders') }}" class="axil-btn btn-bg-lighter">Back</a>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- payment end -->
@endsection