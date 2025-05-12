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
                                        <a class="nav-item nav-link" href="{{ route('customer.orders') }}"><i class="fas fa-shopping-basket"></i>Orders</a>
                                        <a class="nav-item nav-link active" active" data-bs-toggle="tab" href="#setting" role="tab" aria-selected="true"><i class="fas fa-shopping-basket"></i>Account Details</a>
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
                                <div class="tab-pane fade show active" id="setting" role="tabpanel">
                                    <div class="axil-dashboard-account">
                                        <form class="account-details-form" action="{{ route('customer.setting') }}" enctype="multipart/form-data" method="post">
                                            @csrf
                                            <div class="row">
                                                <h5 class="title">Change Profile</h5>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Name <span style="color: red">*</span></label>
                                                        <input type="text" class="form-control" name="name" value="{{ $customer->name }}" placeholder="Full Name" required>
                                                        <p class="text-danger">{{ $errors->first('name') }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Email <span style="color: red">*</span></label>
                                                        <input type="text" class="form-control" name="email" value="{{ $customer->email }}" placeholder="Email Address" readonly>
                                                        <p class="text-danger">{{ $errors->first('email') }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-6">
                                                    <div class="form-group">
                                                        <label>Phone <span style="color: red">*</span></label>
                                                        <input type="text" class="form-control" name="phone_number" value="{{ $customer->phone_number }}" placeholder="Phone Number">
                                                        <p class="text-danger">{{ $errors->first('phone_number') }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group mb--40">
                                                        <label>Province <span style="color: red">*</span></label>
                                                        <select name="province_id" id="province_id" required>
                                                            <option value="">Select Province</option>
                                                            @foreach ($provinces as $row)
                                                            <option value="{{ $row->id }}" {{ $customer->district->province_id == $row->id ? 'selected':'' }}>{{ $row->name }}</option>
                                                            @endforeach
                                                        </select>
                                                        <p class="text-danger">{{ $errors->first('province_id') }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group mb--40">
                                                        <label>Country/ Region <span style="color: red">*</span></label>
                                                        <select name="city_id" id="city_id" required>
                                                            <option value="">Select Country/ Region</option>
                                                        </select>
                                                        <p class="text-danger">{{ $errors->first('city_id') }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-6">
                                                    <div class="form-group mb--40">
                                                        <label>District <span style="color: red">*</span></label>
                                                        <select name="district_id" id="district_id" required>
                                                            <option value="">Select District</option>
                                                        </select>
                                                        <p class="text-danger">{{ $errors->first('district_id') }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-lg-12">
                                                    <div class="form-group">
                                                        <label>Address <span style="color: red">*</span></label>
                                                        <textarea name="address" id="address" rows="2" required>{{ $customer->address }}</textarea>
                                                        <p class="text-danger">{{ $errors->first('address') }}</p>
                                                    </div>
                                                </div>
                                                <div class="col-12">
                                                    <h5 class="title">Password Change</h5>
                                                    <div class="form-group">
                                                        <label>Password</label>
                                                        <input type="password" name="old-password" class="form-control" placeholder="Old Password">
                                                    </div>
                                                    <div class="form-group">
                                                        <label>New Password</label>
                                                        <input type="password" name="password" class="form-control" placeholder="New Password">
                                                        <p class="text-danger">{{ $errors->first('password') }}</p>
                                                    </div>
                                                    <div class="form-group">
                                                        <label>Confirm New Password</label>
                                                        <input type="password" name="confirm-password" class="form-control" placeholder="Confirm Password">
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

@section('js')
    <script>
        $(document).ready(function(){
            loadCity($('#province_id').val(), 'bySelect').then(() => {
                loadDistrict($('#city_id').val(), 'bySelect');
            })
        })

        $('#province_id').on('change', function() {
            loadCity($(this).val(), '');
        })

        $('#city_id').on('change', function() {
            loadDistrict($(this).val(), '')
        })

        function loadCity(province_id, type) {
            return new Promise((resolve, reject) => {
                $.ajax({
                    url: "{{ url('/api/city') }}",
                    type: "GET",
                    data: { province_id: province_id },
                    success: function(html){
                        $('#city_id').empty()
                        $('#city_id').append('<option value="">Select Country/ Region</option>')
                        $.each(html.data, function(key, item) {
                            let city_selected = {{ $customer->district->city_id }};
                            let selected = type == 'bySelect' && city_selected == item.id ? 'selected':'';
                            $('#city_id').append('<option value="'+item.id+'" '+ selected +'>'+item.name+'</option>')
                            resolve()
                        })
                    }
                });
            })
        }

        function loadDistrict(city_id, type) {
            $.ajax({
                url: "{{ url('/api/district') }}",
                type: "GET",
                data: { city_id: city_id },
                success: function(html){
                    $('#district_id').empty()
                    $('#district_id').append('<option value="">Select District</option>')
                    $.each(html.data, function(key, item) {
                        let district_selected = {{ $customer->district->id }};
                        let selected = type == 'bySelect' && district_selected == item.id ? 'selected':'';
                        $('#district_id').append('<option value="'+item.id+'" '+ selected +'>'+item.name+'</option>')
                    })
                }
            });
        }
    </script>
@endsection