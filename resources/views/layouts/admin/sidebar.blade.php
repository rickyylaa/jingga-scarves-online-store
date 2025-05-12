<!-- Sidebar Menu Start -->
<nav class="pc-sidebar">
    <div class="navbar-wrapper">

        <!-- Logo Start -->
        <div class="m-header">
            <a href="{{ url('admin/dashboard') }}" class="b-brand text-primary">
                <br><br>
                <h2 style="color: rgb(102, 138, 255)">Jingga Scarves</h2>
            </a>
        </div>
        <!-- Logo End -->

        <!-- Navbar Content Start -->
        <div class="navbar-content">
            <ul class="pc-navbar">
                <li class="pc-item pc-caption">
                    <label>Navigation</label>
                    <svg class="pc-icon">
                        <use xlink:href="#custom-notification-status"></use>
                    </svg>
                </li>
                <li class="pc-item {{ request()->is('admin/dashboard') ? 'active open' : '' }}">
                    <a href="{{ url('admin/dashboard') }}" class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-home"></use>
                            </svg>
                        </span>
                        <span class="pc-mtext">Dashboard</span>
                    </a>
                </li>
                <li class="pc-item pc-caption">
                    <label>Pages</label>
                    <svg class="pc-icon">
                        <use xlink:href="#custom-notification-status"></use>
                    </svg>
                </li>
                <li class="pc-item {{ request()->is('admin/category') ? 'active open' : '' }}">
                    <a href="{{ route('category.index') }}" class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-shopping-bag"></use>
                            </svg>
                        </span>
                        <span class="pc-mtext">Kategori</span>
                    </a>
                </li>
                <li class="pc-item {{ request()->is('admin/product') ? 'active open' : '' }}">
                    <a href="{{ route('product.index') }}" class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-shopping-bag"></use>
                            </svg>
                        </span>
                        <span class="pc-mtext">Produk</span>
                    </a>
                </li>
                <li class="pc-item pc-caption">
                    <label>Misc</label>
                    <svg class="pc-icon">
                        <use xlink:href="#custom-notification-status"></use>
                    </svg>
                </li>
                <li class="pc-item {{ request()->is('orders') ? 'active open' : '' }}">
                    <a href="{{ route('orders.index') }}" class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-dollar-square"></use>
                            </svg>
                        </span>
                        <span class="pc-mtext">Pesanan</span>
                    </a>
                </li>
                <li class="pc-item pc-hasmenu">
                    <a href="#!" class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-document"></use>
                            </svg>
                        </span>
                        <span class="pc-mtext">Laporan</span>
                        <span class="pc-arrow"><i data-feather="chevron-right"></i></span>
                    </a>
                    <ul class="pc-submenu">
                        <li class="pc-item"><a class="pc-link" href="{{ route('report.order') }}">Pesanan</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{ route('report.return') }}">Kembalikan Barang</a></li>
                        <li class="pc-item"><a class="pc-link" href="{{ route('report.product') }}">Data Barang</a></li>
                    </ul>
                </li>
                {{-- <li class="pc-item pc-caption">
                    <label>User</label>
                    <svg class="pc-icon">
                        <use xlink:href="#custom-notification-status"></use>
                    </svg>
                </li>
                <li class="pc-item {{ request()->is('user') ? 'active open' : '' }}">
                    <a href="{{ route('user.index') }}" class="pc-link">
                        <span class="pc-micon">
                            <svg class="pc-icon">
                                <use xlink:href="#custom-user-square"></use>
                            </svg>
                        </span>
                        <span class="pc-mtext">User</span>
                    </a>
                </li> --}}
            </ul>
        </div>
        <!-- Navbar Content End -->
    </div>
</nav>
<!-- Sidebar Menu End -->
