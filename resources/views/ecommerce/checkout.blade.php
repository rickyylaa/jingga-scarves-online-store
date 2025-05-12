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
        <!-- checkout start -->
        <div class="axil-checkout-area axil-section-gap">
            <div class="container">
                <form action="{{ route('front.store_checkout') }}" method="post" novalidate="novalidate">
                    @csrf
                    @method('post')
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="axil-checkout-billing">
                                <h4 class="title mb--40">Billing details</h4>
                                <div class="form-group">
                                    <label>Full Name <span>*</span></label>
                                    @if (auth()->guard('customer')->check())
                                    <input type="text" name="customer_name" id="customer_name" placeholder="Full Name" value="{{ auth()->guard('customer')->user()->name }}" require>
                                    @else
                                    <input type="text" name="customer_name" id="customer_name" placeholder="Full Name" required>
                                    @endif
                                    <p class="text-danger">{{ $errors->first('customer_name') }}</p>
                                </div>
                                <div class="form-group">
                                    <label>Email <span>*</span></label>
                                    @if (auth()->guard('customer')->check())
                                    <input type="email" name="email" id="email" placeholder="Email Address" value="{{ auth()->guard('customer')->user()->email }}" required {{ auth()->guard('customer')->check() ? 'readonly':'' }}>
                                    @else
                                    <input type="email" name="email" id="email" placeholder="Email Address" required>
                                    @endif
                                    <p class="text-danger">{{ $errors->first('email') }}</p>
                                </div>
                                <div class="form-group">
                                    <label>Phone <span>*</span></label>
                                    @if (auth()->guard('customer')->check())
                                    <input type="text" name="customer_phone" id="customer_phone" placeholder="Phone Number" value="{{ auth()->guard('customer')->user()->phone_number }}" required>
                                    @else
                                    <input type="text" name="customer_phone" id="customer_phone" placeholder="Phone Number" required>
                                    @endif
                                    <p class="text-danger">{{ $errors->first('customer_phone') }}</p>
                                </div>
                                <div class="form-group">
                                    <label>Province <span>*</span></label>
                                    <select name="province_id" id="province_id" required>
                                        <option value="">Select Province</option>
                                        @foreach ($provinces as $row)
                                        <option value="{{ $row->id }}">{{ $row->name }}</option>
                                        @endforeach
                                    </select>
                                    <p class="text-danger">{{ $errors->first('province_id') }}</p>
                                </div>
                                <div class="form-group">
                                    <label>Country/ Region <span>*</span></label>
                                    <select name="city_id" id="city_id" required>
                                        <option value="">Select Country/ Region</option>
                                    </select>
                                    <p class="text-danger">{{ $errors->first('city_id') }}</p>
                                </div>
                                <div class="form-group">
                                    <label>District <span>*</span></label>
                                    <select name="district_id" id="district_id" required>
                                        <option value="">Select District</option>
                                    </select>
                                    <p class="text-danger">{{ $errors->first('district_id') }}</p>
                                </div>
                                <div class="form-group">
                                    <label>Courier <span>*</span></label>
                                    <input type="hidden" name="weight" id="weight" value="{{ $weight }}">
                                    <select name="courier" id="courier">
                                        <option value="">Select Courier</option>
                                        <option value="jne">JNE</option>
                                        <option value="tiki">TIKI</option>
                                        <option value="pos">POS Indonesia</option>
                                    </select>
                                    <p class="text-danger">{{ $errors->first('courier') }}</p>
                                </div>
                                <div class="form-group">
                                    <label>Address <span>*</span></label>
                                    @if (auth()->guard('customer')->check())
                                    <textarea name="customer_address" id="customer_address" rows="2" required>{{ auth()->guard('customer')->user()->address }}</textarea>
                                    @else
                                    <textarea name="customer_address" id="customer_address" rows="2" required></textarea>
                                    @endif
                                    <p class="text-danger">{{ $errors->first('email') }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="axil-order-summery order-checkout-summery">
                                <h5 class="title mb--20">Your Order</h5>
                                <div class="summery-table-wrap">
                                    <table class="table summery-table">
                                        <thead>
                                            <tr>
                                                <th>Product</th>
                                                <th>Subtotal</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($carts as $cart)
                                            <tr class="order-product">
                                                <td>{{ \Str::limit($cart['product_name'], 10) }}<span class="quantity">x{{ $cart['qty'] }}</span></td>
                                                <td>Rp{{ number_format($cart['product_price']) }}</td>
                                            </tr>
                                            @endforeach
                                            <tr class="order-subtotal">
                                                <td>Subtotal</td>
                                                <td>Rp{{ number_format($subtotal) }}</td>
                                            </tr>
                                            <tr class="order-shipping">
                                                <td colspan="2">
                                                    <div class="shipping-amount">
                                                        <span class="title">Shipping</span>
                                                        <span id="ongkir">Rp0</span>
                                                        <input type="hidden" name="ongkir" id="ongkir_input">
                                                    </div>
                                                </td>
                                            </tr>
                                            <tr class="order-total">
                                                <td>Total</td>
                                                <td class="order-total-amount">
                                                    Rp <span id="total">{{ number_format($subtotal) }}</span>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                <button type="submit" class="axil-btn btn-bg-primary checkout-btn">Process to Checkout</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- checkout end -->
@endsection

@section('js')
<script>
    $('#province_id').on('change', function() {
        $.ajax({
            url: "{{ url('/api/city') }}",
            type: "GET",
            data: { province_id: $(this).val() },
            success: function(html){
                $('#city_id').empty()
                $('#city_id').append('<option value="">Select Country/ Region</option>')
                $.each(html.data, function(key, item) {
                    $('#city_id').append('<option value="'+item.id+'">'+item.name+'</option>')
                })
            }
        });
    })

    $('#city_id').on('change', function() {
        $.ajax({
            url: "{{ url('/api/district') }}",
            type: "GET",
            data: { city_id: $(this).val() },
            success: function(html){
                $('#district_id').empty()
                $('#district_id').append('<option value="">Select District</option>')
                $.each(html.data, function(key, item) {
                    $('#district_id').append('<option value="'+item.id+'">'+item.name+'</option>')
                })
            }
        });
    })

    $('#courier').on('change', function() {
        $('#ongkir').text("Menghitung..")
        $.ajax({
            url: "{{ url('/api/cost') }}",
            type: "GET",
            data: {
                destination: $('#city_id').val(),
                weight: $('#weight').val(),
                courier: $(this).val()
            },
            success: async function(resp){
                let cost = await resp?.rajaongkir?.results?.[0]?.costs?.[0]?.cost?.[0]?.value
                if (cost) {
                    $('#ongkir').text("Rp" +cost.toString().replace(/\B(?=(\d{3})+(?!\d))/g, ","))
                    $('#ongkir_input').val(cost)
                } else {
                    $('#ongkir').text("Kurir tidak tersedia.")
                }
            }
        });
    })
    </script>
@endsection
