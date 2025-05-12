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

        <!-- Start Shop Area  -->
        <div class="axil-single-product-area bg-color-white">
            <div class="single-product-thumb axil-section-gap pb--30 pb_sm--20">
                <div class="container">
                    <form action="{{ route('front.cart') }}" method="POST">
                        @csrf
                        <div class="row row--50">
                            <div class="col-lg-6 mb--40">
                                <div class="h-100">
                                    <div class="position-sticky sticky-top">
                                        <div class="single-product-thumbnail axil-product">
                                            <div class="thumbnail">
                                                <img src="{{ asset('storage/products/' . $product->image) }}" alt="{{ $product->name }}">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 mb--40">
                                <div class="h-100">
                                    <div class="position-sticky sticky-top">
                                        <div class="single-product-content nft-single-product-content">
                                            <div class="inner">
                                                <h2 class="product-title">{{ $product->name }}</h2>
                                                <div class="price-amount price-offer-amount">
                                                    <span class="price current-price">Rp {{ number_format($product->price) }}</span>
                                                </div>
                                                <div class="product-action-wrapper d-flex-center">
                                                    <ul class="product-action action-style-two d-flex-center mb--0">
                                                        @if (auth()->guard('customer')->check())
                                                        <li class="add-to-cart"><button type="submit" class="axil-btn btn-bg-primary">Add to Cart</button></li>
                                                        @else
                                                        <li class="add-to-cart"><a href="{{ route('customer.login') }}" class="axil-btn btn-bg-primary">Add to Cart</a></li>
                                                        @endif
                                                    </ul>
                                                </div>
                                                <div class="nft-short-meta">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-6">
                                                            <div class="nft-category">
                                                                <label>Quantity :</label>
                                                                <div class="pro-qty">
                                                                    <span onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                                                    class="qtybtn">-</span>
                                                                    <input type="text" name="qty" id="sst" min="1" max="10" value="1">
                                                                    <input type="hidden" name="product_id" value="{{ $product->id }}">
                                                                    <span onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) && sst < {{ $product->qty }}) result.value++;return false;"
                                                                    class="qtybtn">+</span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-6">
                                                            <div class="nft-verified-option">
                                                                <a href="{{ route('front.product') }}" class="verify-btn axil-btn btn-bg-secondary">Continue Shopping</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="woocommerce-tabs wc-tabs-wrapper bg-vista-white nft-info-tabs">
                                                    <div class="container">
                                                        <ul class="nav tabs" id="myTab" role="tablist">
                                                            <li class="nav-item" role="presentation">
                                                                <a class="active" id="description-tab" data-bs-toggle="tab" href="#description" role="tab" aria-controls="description" aria-selected="true">Description</a>
                                                            </li>
                                                            <li class="nav-item " role="presentation">
                                                                <a id="additional-info-tab" data-bs-toggle="tab" href="#additional-info" role="tab" aria-controls="additional-info" aria-selected="false">Additional Information</a>
                                                            </li>
                                                        </ul>
                                                        <div class="tab-content" id="myTabContent">
                                                            <div class="tab-pane fade show active" id="description" role="tabpanel" aria-labelledby="description-tab">
                                                                <div class="product-additional-info">
                                                                    <p class="mb--15"><strong>About this Product</strong></p>
                                                                    <p>{{ $product->description }}</p>
                                                                </div>
                                                            </div>
                                                            <div class="tab-pane fade" id="additional-info" role="tabpanel" aria-labelledby="additional-info-tab">
                                                                <div class="product-additional-info">
                                                                    <div class="table-responsive">
                                                                        <table>
                                                                            <tbody>
                                                                                <tr>
                                                                                    <th>Category</th>
                                                                                    <td>{{ $product->category->name }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Tags </th>
                                                                                    <td>Women</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Stock Available</th>
                                                                                    <td>{{ $product->qty }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Weight</th>
                                                                                    <td>{{ $product->weight}} gr</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Color</th>
                                                                                    <td>{{ $product->color }}</td>
                                                                                </tr>
                                                                                <tr>
                                                                                    <th>Material</th>
                                                                                    <td>{{ $product->material }}</td>
                                                                                </tr>
                                                                            </tbody>
                                                                        </table>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <!-- End .single-product-thumb -->
        </div>
        <!-- End Shop Area  -->
@endsection
