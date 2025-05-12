<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="Touché" />
    <meta name="MobileOptimized" content="width" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Jingga Scarves</title>

    <!--  favicon start -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/images/favicon/icon-alt.png') }}">
    <!--  favicon end -->
    <!--  font icons start -->
    <link rel="stylesheet" href="{{ asset('assets/fonts/slick/slick.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/slick/slick-theme.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/font-awesome/font-awesome.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/fonts/flaticon/flaticon.css') }}">
    <!--  font icons end -->
    <!--  bootstrap start -->
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/jquery-ui.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/sal.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/magnific-popup.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/base.css') }}">
    <!--  bootstrap end -->
    <!--  main end -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
    <!--  main end -->
</head>
<body>
    <!-- register start -->
    <div class="axil-signin-area">
        <div class="signin-header">
            <div class="row align-items-center">
                <div class="col-xl-4 col-sm-6">
                    <a href="/" class="site-logo"><img src="{{ asset('assets/images/logo/logo-alt.png') }}" width="250" height="250" alt="logo"></a>
                </div>
                <div class="col-md-2 d-lg-block d-none">
                    <a href="/" class="back-btn"><i class="far fa-angle-left"></i></a>
                </div>
                <div class="col-xl-6 col-lg-4 col-sm-6">
                    <div class="singin-header-btn">
                        <a href="{{ route('customer.login') }}" class="axil-btn btn-bg-secondary sign-up-btn">Sign In</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xl-4 col-lg-6">
                <div class="axil-signin-banner bg_image bg_image--10">
                    <h3 class="title">We Offer the Best Products</h3>
                </div>
            </div>
            <div class="col-lg-6 offset-xl-2">
                <div class="axil-signin-form-wrap">
                    <div class="axil-signin-form">
                        <form action="{{ route('customer.post_register') }}" method="post" id="contactForm" novalidate="novalidate">
                            @csrf
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Name</label>
                                    <input type="text" class="form-control" id="first" name="customer_name" placeholder="Full Name" required>
                                    <p class="text-danger">{{ $errors->first('customer_name') }}</p>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Phone</label>
                                    <input type="text" class="form-control" name="customer_phone" id="customer_phone" placeholder="Phone Number" required>
                                    <p class="text-danger">{{ $errors->first('customer_phone') }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Email</label>
                                    <input type="email" name="email" id="email" placeholder="Email Address" required>
                                    <p class="text-danger">{{ $errors->first('email') }}</p>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>Province</label>
                                    <select name="province_id" id="province_id" required>
                                        <option value="">Select Province</option>
                                        @foreach ($provinces as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('province_id') }}</p>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label>Country/ Region</label>
                                    <select name="city_id" id="city_id" required>
                                        <option value="">Select Country/ Region</option>
                                    </select>
                                    <p class="text-danger">{{ $errors->first('city_id') }}</p>
                                </div>
                                <div class="col-md-6 form-group">
                                    <label>District</label>
                                    <select name="district_id" id="district_id" required>
                                        <option value="">Select District</option>
                                    </select>
                                    <p class="text-danger">{{ $errors->first('district_id') }}</p>
                                </div>
                            </div>
                            <div class="col-md-12 form-group">
                                <label>Address</label>
                                <textarea name="customer_address" id="customer_address" rows="2" required></textarea>
                                <p class="text-danger">{{ $errors->first('email') }}</p>
                            </div>
                            <div class="form-group">
                                <button type="submit" class="axil-btn btn-bg-primary submit-btn">Create Account</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- register end -->

    <!-- modernizer start -->
    <script src="{{ asset('assets/js/vendor/modernizr.min.js') }}"></script>
    <!-- modernizer end -->
    <!-- jquery start -->
    <script src="{{ asset('assets/js/vendor/jquery.js') }}"></script>
    <!-- jquery end -->
    <!-- bootstrap start -->
    <script src="{{ asset('assets/js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/js.cookie.js') }}"></script>
    <!-- <script src="assets/js/vendor/jquery.style.switcher.js"></script> -->
    <script src="{{ asset('assets/js/vendor/jquery-ui.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.ui.touch-punch.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/sal.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.magnific-popup.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/imagesloaded.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/isotope.pkgd.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/counterup.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/waypoints.min.js') }}"></script>
    <!-- bootstrap end -->
    <!-- main start -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <!-- main end -->
    <script>
        @if(Session::has('success'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
            toastr.success("{{ session('success') }}");
        @endif
        @if(Session::has('errors'))
        toastr.options =
        {
            "closeButton" : true,
            "progressBar" : true
        }
            toastr.error("{{ session('errors') }}");
        @endif
    </script>
    <script>
    $('#province_id').on('change', function() {
        $.ajax({
            url: "{{ url('/api/city') }}",
            type: "GET",
            data: { province_id: $(this).val() },
            success: function(html){
                $('#city_id').empty()
                $('#city_id').append('<option value="">Selcet Country/ Region</option>')
                $.each(html.data, function(key, item) {
                    $('#city_id').append('<option value="'+item.id+'">'+item.name+'</option>')
                })
            }
        });
    })

    $('#city_id').on('change', function() {
        $.ajax({
            url: "{{ url('/api/district') }}",
            type: "GET",
            data: { city_id: $(this).val() },
            success: function(html){
                $('#district_id').empty()
                $('#district_id').append('<option value="">Selcet District</option>')
                $.each(html.data, function(key, item) {
                    $('#district_id').append('<option value="'+item.id+'">'+item.name+'</option>')
                })
            }
        });
    })
    </script>
</body>
</html>