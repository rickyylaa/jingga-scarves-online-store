<!-- header start -->
        <header class="header axil-header header-style-4">
            <div class="axil-header-top">
                <div class="container">
                    <div class="row align-items-center">
                        <div class="col-md-4 col-12">
                            <div class="header-top-dropdown dropdown-box-style">
                                <div class="dropdown">
                                    <button class="dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                        IDR
                                    </button>
                                    <ul class="dropdown-menu">
                                        <li><a class="dropdown-item" href="javascript:void(0);">IDR</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4 col-5">
                            <div class="header-brand">
                                <a href="{{ url('/') }}" class="logo logo-dark">
                                    <img src="{{ asset('assets/images/logo/logo-alt.png') }}" alt="Site Logo">
                                </a>
                                <a href="{{ url('/') }}" class="logo logo-light">
                                    <img src="{{ asset('assets/images/logo/logo-light.png') }}" alt="Site Logo">
                                </a>
                            </div>
                        </div>
                        <div class="col-md-4 col-7">
                            <div class="header-action">
                                <ul class="action-list">
                                    {{-- <li class="axil-search">
                                        <a href="javascript:void(0)" class="header-search-icon" title="Search">
                                            <i class="flaticon-magnifying-glass"></i>
                                        </a>
                                    </li> --}}
                                    @if (auth()->guard('customer')->check())
                                    <li class="shopping-cart">
                                        <a href="{{ route('front.list_cart') }}" class="cart-btn">
                                            <span class="cart-count">{{ $cart_total }}</span>
                                            <i class="flaticon-shopping-cart"></i>
                                        </a>
                                    </li>
                                    @else
                                    <li class="shopping-cart">
                                        <a href="{{ route('customer.login') }}" class="cart-btn">
                                            <span class="cart-count">{{ $cart_total }}</span>
                                            <i class="flaticon-shopping-cart"></i>
                                        </a>
                                    </li>
                                    @endif
                                    <li class="my-account">
                                        <a href="javascript:void(0);">
                                            <i class="flaticon-person"></i>
                                        </a>
                                        <div class="my-account-dropdown">
                                            <ul>
                                                @if (auth()->guard('customer')->check())
                                                <li class="border-0">
                                                    <a href="{{ route('customer.account') }}">Account Settings</a>
                                                </li>
                                                <li class="border-0">
                                                    <a href="{{ route('customer.orders') }}">My Orders</a>
                                                </li>
                                                <li class="border-0">
                                                    <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                                        {{ __('Logout') }}
                                                    </a>
                                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                                        @csrf
                                                    </form>
                                                </li>
                                                @else
                                                <li class="border-0">
                                                    <a href="{{ route('customer.login') }}">Sign In</a>
                                                </li>
                                                <li class="border-0">
                                                    <a href="{{ route('customer.register') }}">Sign Up</a>
                                                </li>
                                                <li class="border-0">
                                                    <a href="{{ route('customer.account') }}">My Orders</a>
                                                </li>
                                                @endif
                                            </ul>
                                        </div>
                                    </li>
                                    <li class="axil-mobile-toggle">
                                        <button class="menu-btn mobile-nav-toggler">
                                            <i class="flaticon-menu-2"></i>
                                        </button>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div id="axil-sticky-placeholder"></div>
        </header>
    <!-- header end -->
