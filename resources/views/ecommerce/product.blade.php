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

        <!-- Start Breadcrumb Area  -->
        <div class="axil-breadcrumb-area">
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-lg-6 col-md-8">
                        <div class="inner">
                            <ul class="axil-breadcrumb">
                                <li class="axil-breadcrumb-item"><a href="index.html">Home</a></li>
                                <li class="separator"></li>
                                <li class="axil-breadcrumb-item active" aria-current="page">My Account</li>
                            </ul>
                            <h1 class="title">Explore All Products</h1>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-4">
                        <div class="inner">
                            <div class="bradcrumb-thumb">
                                <img src="assets/images/product/product-45.png" alt="Image">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Breadcrumb Area  -->

        <!-- Start Shop Area  -->
        <div class="axil-shop-area axil-section-gap bg-color-white">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="axil-shop-top">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="category-select">
                                        <select class="single-select">
                                            <option>Categories</option>
                                            @if(!empty($categories) && $categories->count())
                                            @foreach ($categories as $category)
                                            <option><a href="{{ url('/category/' . $category->slug) }}">{{ $category->name }}</a></option>
                                                @foreach ($category->child as $child)
                                                <option><a href="{{ url('/category/' . $child->slug) }}">{{ $child->name }}</a></option>
                                                @endforeach
                                            @endforeach
                                            @else
                                            <option>Fashion</option>
                                            <option>Electronics</option>
                                            <option>Furniture</option>
                                            <option>Beauty</option>
                                            @endif

                                        </select>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row row--15">
                    @if(!empty($products) && $products->count(100))
                    @foreach($products as $key => $row)
                    <div class="col-xl-3 col-lg-4 col-sm-6">
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
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="axil-product product-style-one has-color-pick mt--40">
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
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="axil-product product-style-one has-color-pick mt--40">
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
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="axil-product product-style-one has-color-pick mt--40">
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
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="axil-product product-style-one has-color-pick mt--40">
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
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="axil-product product-style-one has-color-pick mt--40">
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
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="axil-product product-style-one has-color-pick mt--40">
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
                    <div class="col-xl-3 col-lg-4 col-sm-6">
                        <div class="axil-product product-style-one has-color-pick mt--40">
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
            </div>
        </div>
        <!-- End Shop Area  -->

@endsection