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
                                        <form class="account-details-form" action="{{ route('customer.savePayment') }}" enctype="multipart/form-data" method="post">
                                            @csrf
                                            <div class="row">
                                                <h5 class="title">Payment
                                                </h5>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Invoice <span style="color: red">*</span></label>
                                                        <input type="text" class="form-control" name="invoice" value="{{ request()->invoice }}" placeholder="InvoiceID" required>
                                                        <p class="text-danger">{{ $errors->first('invoice') }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Name <span style="color: red">*</span></label>
                                                        <input type="text" class="form-control" name="name" placeholder="Full Name" required>
                                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group mb--40">
                                                        <label>Bank <span style="color: red">*</span></label>
                                                        <select name="transfer_to" class="select2" required>
                                                            <option value="">Select</option>
                                                            <option value="BCA - 1234567">BCA: 8190535429 a.n Inggrit Tia Septiana</option>
                                                            <option value="BRI - 9876543">BRI: 819053542927641 a.n Inggrit Tia Septiana</option>
                                                            <option value="BNI - 6789456">BNI: 8190535429 a.n Inggrit Tia Septiana</option>
                                                        </select>
                                                        <p class="text-danger">{{ $errors->first('transfer_to') }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Amount <span style="color: red">*</span></label>
                                                        <input type="number" class="form-control" name="amount" placeholder="Amount" required>
                                                        <p class="text-danger">{{ $errors->first('amount') }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Transfer Date <span style="color: red">*</span></label>
                                                        <input type="date" class="form-control" name="transfer_date" placeholder="Amount" required>
                                                        <p class="text-danger">{{ $errors->first('transfer_date') }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Proof <span style="color: red">*</span></label>
                                                        <input type="file" class="form-control" name="proof" required>
                                                        <p class="text-danger">{{ $errors->first('proof') }}</p>
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