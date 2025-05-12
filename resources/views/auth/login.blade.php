<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0, minimal-ui">
    <!-- CSRF Token Start -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!-- CSRF Token End -->
    
    <title>Jingga Scarves</title>

    <!-- Meta Start -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="description" content="Able Pro is trending dashboard template made using Bootstrap 5 design framework. Able Pro is available in Bootstrap, React, CodeIgniter, Angular,  and .net Technologies.">
    <meta name="keywords" content="Bootstrap admin template, Dashboard UI Kit, Dashboard Template, Backend Panel, react dashboard, angular dashboard">
    <meta name="author" content="Phoenixcoded">
    <!-- Meta End -->

    <!-- Favicon Icon Start -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('dist/images/favicon/icon.png') }}" />
    <!-- Favicon Icon End -->
    <!-- Font Family Start -->
    <link rel="stylesheet" href="{{ asset('dist/fonts/inter/inter.css') }}" id="main-font-link" />
    <!-- Font Family End -->
    <!-- Tabler Icons Start -->
    <link rel="stylesheet" href="{{ asset('dist/fonts/tabler-icons.min.css') }}" />
    <!-- Tabler Icons End -->
    <!-- Feather Icons Start -->
    <link rel="stylesheet" href="{{ asset('dist/fonts/feather.css') }}" />
    <!-- Feather Icons End -->
    <!-- Font Awesome Icons Start -->
    <link rel="stylesheet" href="{{ asset('dist/fonts/fontawesome.css') }}" />
    <!-- Font Awesome Icons End -->
    <!-- Material Icons Start -->
    <link rel="stylesheet" href="{{ asset('dist/fonts/material.css') }}" />
    <!-- Material Icons End -->
    <!-- Template CSS Files Start -->
    <link rel="stylesheet" href="{{ asset('dist/css/style.css') }}" id="main-style-link" />
    <link rel="stylesheet" href="{{ asset('dist/css/style-preset.css') }}" />
    <!-- Template CSS Files End -->

    <!-- Google Tag Start -->
    <script async src="https://www.googletagmanager.com/gtag/js?id=G-14K1GBX9FG"></script>
    <!-- Google Tag End -->

    <!-- Layer Start -->
    <script>
    window.dataLayer = window.dataLayer || [];
        function gtag() {
            dataLayer.push(arguments);
        }
        gtag('js', new Date());

        gtag('config', 'G-14K1GBX9FG');
    </script>
    <!-- Layer End -->

    <!-- WiserNotify Start -->
    <script>
    !(function () {
        if (window.t4hto4) console.log('WiserNotify pixel installed multiple time in this page');
        else {
            window.t4hto4 = !0;
            var t = document,
            e = window,
            n = function () {
                var e = t.createElement('script');
                (e.type = 'text/javascript'),
                (e.async = !0),
                (e.src = 'https://pt.wisernotify.com/pixel.js?ti=1jclj6jkfc4hhry'),
                document.body.appendChild(e);
            };
        'complete' === t.readyState ? n() : window.attachEvent ? e.attachEvent('onload', n) : e.addEventListener('load', n, !1);
        }
    })();
    </script>
    <!-- WiserNotify End -->

    <!-- Microsoft clarity Start -->
    <script type="text/javascript">
    (function (c, l, a, r, i, t, y) {
        c[a] =
            c[a] ||
            function () {
                (c[a].q = c[a].q || []).push(arguments);
            };
        t = l.createElement(r);
        t.async = 1;
        t.src = 'https://www.clarity.ms/tag/' + i;
        y = l.getElementsByTagName(r)[0];
        y.parentNode.insertBefore(t, y);
    })(window, document, 'clarity', 'script', 'gkn6wuhrtb');
    </script>
    <!-- Microsoft clarity End -->
</head>
<body data-pc-preset="preset-1" data-pc-sidebar-caption="true" data-pc-direction="ltr" data-pc-theme_contrast="" data-pc-theme="light">
    <div class="auth-main">
        <div class="auth-wrapper v1">
            <div class="auth-form">
                <div class="card my-5">
                    <div class="card-body">
                        <div class="text-center">
                            <a href="#"><img src="{{ asset('dist/images/logo/logo-alt.png') }}" width="250px" height="35px" alt="img" class="mb-3"></a>
                        </div>
                        <form method="POST" action="{{ route('login') }}">
                        @csrf
                            <div class="form-group mb-3">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="form-group mb-3">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                                @error('password')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                            </div>
                            <div class="d-flex mt-1 justify-content-between align-items-center">
                                <div class="form-check">
                                <input class="form-check-input input-primary" type="checkbox" name="remember" id="remember" checked="" />
                                <label class="form-check-label text-muted" for="remember">{{ __('Remember me?') }}</label>
                                </div>
                                @if (Route::has('password.request'))
                                <a class="text-secondary f-w-400 mb-0" href="{{ route('password.request') }}">
                                    {{ __('Forgot Your Password?') }}
                                </a>
                                @endif
                            </div>
                            <div class="d-grid mt-4">
                                <button type="submit" class="btn btn-primary">{{ __('Login') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Required Js Start -->
    <script src="{{ asset('dist/js/plugins/popper.min.js') }}"></script>
    <script src="{{ asset('dist/js/plugins/simplebar.min.js') }}"></script>
    <script src="{{ asset('dist/js/plugins/bootstrap.min.js') }}"></script>
    <script src="{{ asset('dist/js/fonts/custom-font.js') }}"></script>
    <script src="{{ asset('dist/js/pcoded.js') }}"></script>
    <script src="{{ asset('dist/js/plugins/feather.min.js') }}"></script>
    <!-- Required Js End -->
</body>
</html>