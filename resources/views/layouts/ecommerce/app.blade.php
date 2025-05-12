<!DOCTYPE html>
<html class="no-js" lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8" />
    <meta name="description" content="Touché" />
    <meta name="MobileOptimized" content="width" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    @yield('title')

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
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/toastr.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/vendor/base.css') }}">
    <!--  bootstrap end -->
    <!--  main end -->
    <link rel="stylesheet" href="{{ asset('assets/css/style.min.css') }}">
    <!--  main end -->
</head>
<body class="sticky-header newsletter-popup-modal">
    <a href="#top" class="back-to-top" id="backto-top"><i class="fal fa-arrow-up"></i></a>
    @include('layouts.ecommerce.header')


    <!-- main start  -->
    <main class="main-wrapper">

        @yield('content')
    </main>
    <!-- main end  -->

    @include('layouts.ecommerce.footer')

    
    @include('layouts.ecommerce.search')
    

    <!-- modernizer start -->
    <script src="{{ asset('assets/js/vendor/modernizr.min.js') }}"></script>
    <!-- modernizer end -->
    <!-- jquery start -->
    <script src="{{ asset('assets/js/vendor/jquery.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery.min.js') }}"></script>
    <!-- jquery end -->
    <!-- bootstrap start -->
    <script src="{{ asset('assets/js/vendor/popper.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/slick.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/js.cookie.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/toastr.min.js') }}"></script>
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

    @yield('js')

    <script>
    @if(Session::has('success'))
        toastr.success("{{ Session::get('success') }}");
        @endif
        @if(Session::has('errors'))
        toastr.error("{{ Session::get('errors') }}");
        @endif
    </script>

</body>
</html>
