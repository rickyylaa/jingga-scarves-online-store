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

        <!-- Start Cart Area  -->
        <div class="axil-product-cart-area axil-section-gap">
            <div class="container">
                <div class="axil-product-cart-wrap">
                @if ($message) 
                    <p style="color: red;">{{ $message }}</p>
                @endif
                <form action="{{ route('front.update_cart') }}" method="post">
                        @csrf
                        <div class="table-responsive">
                            <table class="table axil-product-table axil-cart-table mb--40">
                                <thead>
                                    <tr>
                                        <th scope="col" class="product-remove"></th>
                                        <th scope="col" class="product-thumbnail">Produk</th>
                                        <th scope="col" class="product-title"></th>
                                        <th scope="col" class="product-price">Harga</th>
                                        <th scope="col" class="product-quantity">Quantity</th>
                                        <th scope="col" class="product-subtotal">Subtotal</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse ($carts as $row)
                                    <tr>
                                        <td class="product-remove">
                                        </td>
                                        <td class="product-thumbnail">
                                            <img src="{{ asset('storage/products/' . $row['product_image']) }}" alt="{{ $row['product_name'] }}">
                                        </td>
                                        <td class="product-title">
                                                {{ $row['product_name'] }}
                                        </td>
                                        <td class="product-price" data-title="Price">
                                            <span class="currency-symbol">Rp</span>{{ number_format($row['product_price']) }}
                                        </td>
                                        <td class="product-quantity" data-title="Qty">
                                            <div class="pro-qty">
                                            <span onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) &amp;&amp; sst > 0 ) result.value--;return false;"
                                            class="qtybtn">-</span>
                                            <input type="text" name="qty[]" id="sst" min="1" max="10" value="{{ $row['qty'] }}">
                                            <span onclick="var result = document.getElementById('sst'); var sst = result.value; if( !isNaN( sst ) && sst < {{ $row['qty'] }}) result.value++;return false;"
                                            class="qtybtn">+</span>
                                                <!-- <input type="text" name="qty" id="sst{{ $row['product_id'] }}" min="1" max="10" value="{{ $row['qty'] }}"> -->
                                                <input type="hidden" name="product_id[]" value="{{ $row['product_id'] }}" min="1" max="10">
                                            </div>
                                        </td>
                                        <td class="product-subtotal" data-title="Subtotal"><span class="currency-symbol">Rp</span>{{ number_format($row['product_price'] * $row['qty']) }}</td>
                                    </tr>
                                    @empty
                                    <tr>
                                        <td colspan="12" class="text-center">Tidak ada belanjaan</td>
                                    </tr>
                                    @endforelse
                                </tbody>
                            </table>
                        </div>
                        <div class="cart-update-btn-area">
                            <div class="input-group">
                                <div class="update-btn">
                                    <button class="axil-btn btn-outline">Update Cart</button>
                                </div>
                            </div>
                        </div>
                    </form>
                    <div class="row">
                        <div class="col-xl-5 col-lg-7 offset-xl-7 offset-lg-5">
                            <div class="axil-order-summery">
                                <h5 class="title mb--20">Order Summary</h5>
                                <div class="summery-table-wrap">
                                    <table class="table summery-table mb--30">
                                        <tbody>
                                            <tr class="order-subtotal">
                                                <td>Subtotal</td>
                                                <td>Rp{{ number_format($subtotal) }}</td>
                                            </tr>
                                            <tr class="order-total">
                                                <td>Total</td>
                                                <td class="order-total-amount">Rp{{ number_format($subtotal) }}</td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                @if($message)
                                <a href="#" class="btn-secondary btn py-4 checkout-btn mb--10 h6 disabled">Process to Checkout</a>
                                @else
                                <a href="{{ route('front.checkout') }}" class="axil-btn btn-bg-primary checkout-btn mb--10">Process to Checkout</a>
                                @endif
                                <a href="{{ route('front.product') }}" class="axil-btn btn-outline checkout-btn">Continue Shopping</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- End Cart Area  -->
@endsection