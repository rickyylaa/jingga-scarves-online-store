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
    <!-- login start -->
    <div class="axil-signin-area">

        <!-- header start -->
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
                        <a href="{{ route('customer.register') }}" class="axil-btn btn-bg-secondary sign-up-btn">Sign Up Now</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- header end -->

        <!-- form start -->
        <div class="row">
            <div class="col-xl-4 col-lg-6">
                <div class="axil-signin-banner bg_image bg_image--9">
                    <h3 class="title">We Offer the Best Products</h3>
                </div>
            </div>
            <div class="col-lg-6 offset-xl-2">
                <div class="axil-signin-form-wrap">
                    <div class="axil-signin-form">
                        <h3 class="title">Sign in to eTrade.</h3>
                        <p class="b2 mb--55">Enter your detail below</p>
                        <form action="{{ route('customer.post_login') }}" method="post" id="contactForm" novalidate="novalidate">
                            @csrf
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email Address">
                            </div>
                            <div class="form-group">
                                <label>Password</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                            <div class="form-group d-flex align-items-center justify-content-between">
                                <button type="submit" value="submit" class="axil-btn btn-bg-primary submit-btn">Sign In</button>
                                <a href="forgot-password.html" class="forgot-btn">Forget password?</a>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
        <!-- form end -->

    </div>
    <!-- login end -->

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

</body>
</html>