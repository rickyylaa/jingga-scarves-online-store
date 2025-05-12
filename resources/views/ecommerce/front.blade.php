@extends('layouts.ecommerce.app')

@section('title')
    <title>Jingga Scarves</title>
@endsection

@section('content')
<!-- Start Slider Area -->
        <div class="axil-main-slider-area main-slider-style-4">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="main-slider-content">
                            <h1 class="title">Life is more than hijab and hit movies.</h1>
                            <div class="shop-btn">
                                <a href="{{ route('front.product') }}" class="axil-btn btn-bg-primary"><i class="far fa-shopping-cart"></i> Check
                                    it Out!</a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="slide-thumb-area">
                            <div class="main-thumb">
                                <img src="{{ asset('assets/images/banner/hijaber.png') }}" alt="Women's Product">
                            </div>
                            <div class="banner-product">
                                <div class="product-details">
                                    <h4 class="title"><a href="{{ route('front.product') }}">Ladies Stylish Hijab</a></h4>
                                    <div class="price">Rp300,000</div>
                                    <div class="product-rating">
                                        <span class="icon">
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                    <i class="fas fa-star"></i>
                                </span>
                                        <span class="rating-number">6,400</span>
                                    </div>
                                </div>
                                <div class="plus-icon">
                                    <i class="far fa-plus"></i>
                                </div>
                            </div>
                            <ul class="shape-group">
                                <li class="shape-1">
                                    <svg width="717" height="569" viewBox="0 0 717 569" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M700.635 568.176C593.701 653.555 569.268 645.843 418.418 256.006C229.855 -231.289 -105.017 93.7591 62.1304 620.614" stroke="url(#paint0_linear_3774_13416)" stroke-width="32" stroke-linecap="round" />
                                        <defs>
                                            <linearGradient id="paint0_linear_3774_13416" x1="359.308" y1="-263.741" x2="-235.553" y2="631.772" gradientUnits="userSpaceOnUse">
                                                <stop offset="0.258739" stop-color="#FAF1EE" />
                                                <stop offset="1" stop-color="#FEEAE9" />
                                            </linearGradient>
                                        </defs>
                                    </svg>
                                </li>
                                <li class="shape-2">
                                    <svg width="806" height="605" viewBox="0 0 806 605" fill="none" xmlns="http://www.w3.org/2000/svg">
                                        <g clip-path="url(#clip0_1478_3882)">
                                            <path d="M786.673 3C806.703 135.413 745.738 384.513 341.63 321.606C-163.504 242.971 -51.9045 685.856 476.273 802" stroke="url(#paint0_linear_1478_3882)" stroke-width="32" stroke-linecap="round" />
                                        </g>
                                        <defs>
                                            <linearGradient id="paint0_linear_1478_3882" x1="-232.181" y1="-67.0641" x2="659.844" y2="1032.81" gradientUnits="userSpaceOnUse">
                                                <stop offset="0.525282" stop-color="#FBE9E3" />
                                                <stop offset="1" stop-color="#FFD3C5" />
                                            </linearGradient>
                                            <clipPath id="clip0_1478_3882">
                                                <rect width="806" height="605" fill="white" />
                                            </clipPath>
                                        </defs>
                                    </svg>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Slider Area -->

        <!-- Start Expolre Product Area  -->
        <div class="axil-product-area bg-color-white section-gap-80-35">
            <div class="container">
                <div class="section-title-border">
                    <h2 class="title">Explore Our Products 💥</h2>
                </div>
                <div class="row">
                    @if(!empty($products) && $products->count(8))
                    @foreach($products as $key => $row)
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                        <div class="axil-product product-style-one has-color-pick mt--40">
                            <div class="thumbnail">
                                <a href="{{ url('/product/' . $row->slug) }}">
                                    <img data-sal="zoom-out" data-sal-delay="100" data-sal-duration="800" loading="lazy" class="main-img" src="{{ asset('storage/products/' . $row->image) }}" alt="{{ $row->name }}">
                                </a>
                                <div class="label-block label-left">
                                    <div class="product-badget sale">{{ $row->status == '1' ? 'Sale':'New' }}</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="select-option">
                                            <a href="{{ url('/product/' . $row->slug) }}">
                                                <i class="far fa-shopping-cart"></i> Add to Cart
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="{{ url('/product/' . $row->slug) }}">{{ $row->name }}</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price current-price">Rp{{ number_format($row->price) }}</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    @else
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                        <div class="axil-product product-style-eight">
                            <div class="thumbnail">
                                <a href="single-product-8.html">
                                    <img data-sal="zoom-out" data-sal-delay="100" data-sal-duration="800" loading="lazy" class="main-img" src="{{ asset('assets/images/product/electric/product-01.png') }}" alt="Product Images">
                                </a>
                                <div class="label-block label-left">
                                    <div class="product-badget sale">Sale</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="select-option">
                                            <a href="single-product-8.html">
                                                <i class="far fa-shopping-cart"></i> Add to Cart
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product-8.html">Kalrez® Spectrum™ 6375</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price current-price">$17.84</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                        <div class="axil-product product-style-eight">
                            <div class="thumbnail">
                                <a href="single-product-8.html">
                                    <img data-sal="zoom-out" data-sal-delay="150" data-sal-duration="800" loading="lazy" class="main-img" src="{{ asset('assets/images/product/electric/product-04.png') }}" alt="Product Images">
                                </a>
                                <div class="label-block label-left">
                                    <div class="product-badget">20% OFF</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="select-option">
                                            <a href="single-product-8.html">
                                                <i class="far fa-shopping-cart"></i> Add to Cart
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product-8.html">Calvin Klein womens Solid Sheath With Chiffon Bell Sleeves Dress</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price current-price">$78.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                        <div class="axil-product product-style-eight">
                            <div class="thumbnail">
                                <a href="single-product-8.html">
                                    <img data-sal="zoom-out" data-sal-delay="200" data-sal-duration="800" loading="lazy" class="main-img" src="{{ asset('assets/images/product/electric/product-05.png') }}" alt="Product Images">
                                </a>
                                <div class="label-block label-left">
                                    <div class="product-badget">TOP SELLING</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="select-option">
                                            <a href="single-product-8.html">
                                                <i class="far fa-shopping-cart"></i> Add to Cart
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product-8.html">Gildan Men's Ultra Cotton T-Shirt, Style G2000,</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price current-price">$17.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                        <div class="axil-product product-style-eight">
                            <div class="thumbnail">
                                <a href="single-product-8.html">
                                    <img data-sal="zoom-out" data-sal-delay="250" data-sal-duration="800" loading="lazy" class="main-img" src="{{ asset('assets/images/product/electric/product-06.png') }}" alt="Product Images">
                                </a>
                                <div class="label-block label-left">
                                    <div class="product-badget sold-out">SOLD OUT</div>
                                </div>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="select-option">
                                            <a href="single-product-8.html">
                                                <i class="far fa-shopping-cart"></i> Add to Cart
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product-8.html">Essentials Men's Regular-Fit Short-Sleeve Crewneck T-Shirt</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price current-price">$5.22</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                        <div class="axil-product product-style-eight">
                            <div class="thumbnail">
                                <a href="single-product-8.html">
                                    <img data-sal="zoom-out" data-sal-delay="100" data-sal-duration="800" loading="lazy" class="main-img" src="{{ asset('assets/images/product/electric/product-07.png') }}" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="select-option">
                                            <a href="single-product-8.html">
                                                <i class="far fa-shopping-cart"></i> Add to Cart
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product-8.html">2.4G Remote Control Rc BB-8 Droid Football Robot</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price current-price">$100.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                        <div class="axil-product product-style-eight">
                            <div class="thumbnail">
                                <a href="single-product-8.html">
                                    <img data-sal="zoom-out" data-sal-delay="150" data-sal-duration="800" loading="lazy" class="main-img" src="{{ asset('assets/images/product/electric/product-08.png') }}" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="select-option">
                                            <a href="single-product-8.html">
                                                <i class="far fa-shopping-cart"></i> Add to Cart
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product-8.html">Perfume Nat White Chocolate Flavor WONF (BD-10914)</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price current-price">$14.81</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                        <div class="axil-product product-style-eight">
                            <div class="thumbnail">
                                <a href="single-product-8.html">
                                    <img data-sal="zoom-out" data-sal-delay="200" data-sal-duration="800" loading="lazy" class="main-img" src="{{ asset('assets/images/product/electric/product-09.png') }}" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="select-option">
                                            <a href="single-product-8.html">
                                                <i class="far fa-shopping-cart"></i> Add to Cart
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product-8.html">Women's Winter Mid Length Thick Warm Faux Lamb Wool.</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price current-price">$59.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xl-3 col-lg-4 col-sm-6 col-12">
                        <div class="axil-product product-style-eight">
                            <div class="thumbnail">
                                <a href="single-product-8.html">
                                    <img data-sal="zoom-out" data-sal-delay="250" data-sal-duration="800" loading="lazy" class="main-img" src="{{ asset('assets/images/product/electric/product-10.png') }}" alt="Product Images">
                                </a>
                                <div class="product-hover-action">
                                    <ul class="cart-action">
                                        <li class="select-option">
                                            <a href="single-product-8.html">
                                                <i class="far fa-shopping-cart"></i> Add to Cart
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="product-content">
                                <div class="inner">
                                    <h5 class="title"><a href="single-product-8.html">Ion8 One Touch Sport / Bike Water Bottle - Leakproof</a></h5>
                                    <div class="product-price-variant">
                                        <span class="price current-price">$29.00</span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endif
                </div>
                <div class="row">
                    <div class="col-lg-12 text-center mb--20">
                        <a href="{{ route('front.product') }}" class="axil-btn btn-bg-lighter btn-load-more">View All Products</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Expolre Product Area  -->
@endsection