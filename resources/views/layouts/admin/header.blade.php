    <!-- Header Topbar Start -->
    <header class="pc-header">
    <div class="header-wrapper">
        <!-- Mobile Media Block Start -->
        <div class="me-auto pc-mob-drp">
            <ul class="list-unstyled">
                <!-- Menu collapse Icon -->
                <li class="pc-h-item pc-sidebar-collapse">
                    <a href="javascript:void(0);" class="pc-head-link ms-0" id="sidebar-hide">
                    <i class="ti ti-menu-2"></i>
                    </a>
                </li>
                <li class="pc-h-item pc-sidebar-popup">
                    <a href="javascript:void(0);" class="pc-head-link ms-0" id="mobile-collapse">
                    <i class="ti ti-menu-2"></i>
                    </a>
                </li>
                <li class="dropdown pc-h-item">
                    <a class="pc-head-link dropdown-toggle arrow-none m-0 trig-drp-search" data-bs-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="false" aria-expanded="false">
                        <svg class="pc-icon">
                            <use xlink:href="#custom-search-normal-1"></use>
                        </svg>
                    </a>
                    <div class="dropdown-menu pc-h-dropdown drp-search">
                        <form class="px-3 py-2">
                            <input type="search" class="form-control border-0 shadow-none" placeholder="Search here. . ." />
                        </form>
                    </div>
                </li>
            </ul>
        </div>
        <!-- [Mobile Media Block end] -->

        <div class="ms-auto">
            <ul class="list-unstyled">
                <li class="dropdown pc-h-item">
                    <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="false" aria-expanded="false">
                        <svg class="pc-icon">
                            <use xlink:href="#custom-sun-1"></use>
                        </svg>
                    </a>
                    <div class="dropdown-menu dropdown-menu-end pc-h-dropdown">
                        <a href="javascript:void(0);" class="dropdown-item" onclick="layout_change('dark')">
                            <svg class="pc-icon">
                            <use xlink:href="#custom-moon"></use>
                            </svg>
                            <span>Dark</span>
                        </a>
                        <a href="javascript:void(0);" class="dropdown-item" onclick="layout_change('light')">
                            <svg class="pc-icon">
                            <use xlink:href="#custom-sun-1"></use>
                            </svg>
                            <span>Light</span>
                        </a>
                    </div>
                </li>
                <li class="dropdown pc-h-item header-user-profile">
                    <a class="pc-head-link dropdown-toggle arrow-none me-0" data-bs-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="false" data-bs-auto-close="outside" aria-expanded="false">
                        @if(Auth::user()->image)
                        <img src="{{asset('storage/profile/'.Auth::user()->image)}}" alt="{{ Auth::user()->name }}" class="user-avtar">
                        @endif
                    </a>
                    <div class="dropdown-menu dropdown-user-profile dropdown-menu-end pc-h-dropdown">
                        <div class="dropdown-header d-flex align-items-center justify-content-between">
                            <h5 class="m-0">Profile</h5>
                        </div>
                        <div class="dropdown-body">
                            <div class="profile-notification-scroll position-relative" style="max-height: calc(100vh - 225px)">
                                <div class="d-flex mb-1">
                                    <div class="flex-shrink-0">
                                        @if(Auth::user()->image)
                                        <img src="{{asset('storage/profile/'.Auth::user()->image)}}" alt="{{ Auth::user()->name }}" class="user-avtar wid-35">
                                        @endif
                                    </div>
                                    <div class="flex-grow-1 ms-3">
                                        <h6 class="mb-1">{{ Auth::user()->name }}</h6>
                                        <small>{{ Auth::user()->role == '1' ? 'Admin':'User' }}</small>
                                    </div>
                                </div>
                                <hr class="border-secondary border-opacity-50" />
                                <a href="{{ route('dashboard.profile') }}" class="dropdown-item">
                                    <span>
                                    <svg class="pc-icon text-muted me-2">
                                        <use xlink:href="#custom-profile-2user-outline"></use>
                                    </svg>
                                    <span>My Account</span>
                                    </span>
                                </a>
                                <hr class="border-secondary border-opacity-50" />
                                <div class="d-grid mb-3">
                                    <button class="btn btn-primary" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        <svg class="pc-icon me-2">
                                            <use xlink:href="#custom-logout-1-outline"></use>
                                        </svg>
                                        Logout
                                    </button>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </li>
            </ul>
        </div>
    </div>
    </header>
