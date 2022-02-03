@extends('layouts.app_frontend')
@section('content')
 <!-- breadcrumb-area start -->
 <div class="breadcrumb-area">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 text-center">
                <h2 class="breadcrumb-title">Checkout</h2>
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="{{ route('frontend') }}">Home</a></li>
                    <li class="breadcrumb-item active">Checkout</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>

<!-- breadcrumb-area end -->

 <!-- checkout area start -->
    <div class="checkout-area pt-100px pb-100px">
        <div class="container">
            <form action="{{ route('checkout_post') }}" method="POST">
                @csrf
                <div class="row">
                    <div class="col-lg-7">
                        <div class="billing-info-wrap">
                            <h3>Billing Details</h3>
                            @if ($errors->any())
                                <div class="alert alert-danger">
                                    <ul>
                                        @foreach ($errors->all() as $error)
                                            <li>{{ $error }}</li>
                                        @endforeach
                                    </ul>
                                </div>
                            @endif
                            <div class="row">
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>Full Name</label>
                                        <input type="text" value="{{ auth()->user()->name }}" name="name">
                                    </div>
                                </div>
                                <div class="col-lg-6 col-md-6">
                                    <div class="billing-info mb-4">
                                        <label>Email</label>
                                        <input type="text"  value="{{ auth()->user()->email }}" name="email"/>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-4">
                                        <label>Phone</label>
                                        <input type="text" name="phone_number" value="{{ old('phone_number') }}"/>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-select mb-4">
                                        <label>Country</label>
                                        <select name="country" id="country_dropdown">
                                            <option value="">Select a country</option>
                                            @foreach ($countris as $country)
                                                <option value="{{ $country->id }}">{{ $country->name }}</option>
                                            @endforeach

                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-select mb-4">
                                        <label>City</label>
                                        <select name="city" id="city_dropdown" disabled>
                                            <option value=''>Select a country first</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-4">
                                        <label>Street Address</label>
                                        <input class="billing-address" placeholder="House number and street name"
                                            type="text" name="address" value="{{ old('address') }}"/>
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="billing-info mb-4">
                                        <label>Postcode / ZIP</label>
                                        <input type="text" name="post_code" value="{{ old('post_code') }}"/>
                                    </div>
                                </div>
                            </div>

                            <div class="col-lg-12">
                                <div class="billing-info mb-4">
                                    <select class="form-select" name="payment_option">
                                        <option value="1">Cash On Delivery (COD)</option>
                                        <option value="2">Online Payment</option>
                                      </select>
                                </div>
                            </div>


                            <div class="additional-info-wrap">
                                <h4>Additional information</h4>
                                <div class="additional-info">
                                    <label>Order notes</label>
                                    <textarea placeholder="Notes about your order, e.g. special notes for delivery. "
                                        name="order_note">{{ old('order_note') }}</textarea>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-lg-5 mt-md-30px mt-lm-30px ">
                        <div class="your-order-area">
                            <h3>Your order</h3>
                            <div class="your-order-wrap gray-bg-4">
                                <div class="your-order-product-info">
                                    <div class="your-order-top">
                                        <ul>
                                            <li>Product</li>
                                            <li>Total</li>
                                        </ul>
                                    </div>
                                    <div class="your-order-middle">
                                        <ul>
                                            @foreach (allcart() as $product)
                                                <li><span class="order-middle-left">{{ $product->relationtoproduct->product_name }} * {{  $product->amount }}</span> <span
                                                    class="order-price">${{ $product->amount*$product->relationtoproduct->product_price }} </span></li>
                                            @endforeach
                                        </ul>
                                    </div>
                                    <div class="your-order-bottom">
                                        <ul>
                                            <li class="your-order-shipping">Cart Total</li>
                                            <li>${{ session('s_cart_total') }}</li>
                                        </ul>
                                        {{ session('coupon_name') }}
                                        <ul>
                                            <li class="your-order-shipping">Discount Total
                                            @if (session('s_coupon_name'))
                                                ( {{ Session::get('s_coupon_name') }} )
                                            @else
                                                ( {{ 'N/A' }} )
                                            @endif</li>
                                            <li>${{ round(session('s_discount_total')) }}</li>
                                        </ul>
                                        <ul>
                                            <li class="your-order-shipping">Sub Total (Roundet)</li>
                                            <li>${{ round(session('s_cart_total') - session('s_discount_total')) }}</li>
                                        </ul>
                                        <ul>
                                            <li class="your-order-shipping">Shipping</li>
                                            <li>${{ Session::get('shipping') }}</li>
                                        </ul>
                                    </div>
                                    <div class="your-order-total">
                                        <ul>
                                            <li class="order-total">Total</li>
                                            <li>${{ round(session('s_cart_total') - session('s_discount_total')) + Session::get('shipping')  }}</li>
                                        </ul>
                                    </div>
                                </div>
{{-- <div class="payment-method">
    <div class="payment-accordion element-mrg">
        <div id="faq" class="panel-group">
            <div class="panel panel-default single-my-account m-0">
                <div class="panel-heading my-account-title">
                    <h4 class="panel-title"><a data-bs-toggle="collapse"
                            href="#my-account-1" class="collapsed"
                            aria-expanded="true">Direct bank transfer</a>
                    </h4>
                </div>
                <div id="my-account-1" class="panel-collapse collapse show"
                    data-bs-parent="#faq">

                    <div class="panel-body">
                        <p>Please send a check to Store Name, Store Street, Store Town,
                            Store State / County, Store Postcode.</p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default single-my-account m-0">
                <div class="panel-heading my-account-title">
                    <h4 class="panel-title"><a data-bs-toggle="collapse"
                            href="#my-account-2" aria-expanded="false"
                            class="collapsed">Check payments</a></h4>
                </div>
                <div id="my-account-2" class="panel-collapse collapse"
                    data-bs-parent="#faq">

                    <div class="panel-body">
                        <p>Please send a check to Store Name, Store Street, Store Town,
                            Store State / County, Store Postcode.</p>
                    </div>
                </div>
            </div>
            <div class="panel panel-default single-my-account m-0">
                <div class="panel-heading my-account-title">
                    <h4 class="panel-title"><a data-bs-toggle="collapse"
                            href="#my-account-3">Cash on delivery</a></h4>
                </div>
                <div id="my-account-3" class="panel-collapse collapse"
                    data-bs-parent="#faq">

                    <div class="panel-body">
                        <p>Please send a check to Store Name, Store Street, Store Town,
                            Store State / County, Store Postcode.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>

</div> --}}
                            </div>
                            <div class="Place-order mt-25">
                                <input class="btn-hover btn btn-danger" type="submit" value="Place Order">
                            </div>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- checkout area end -->
@endsection

@section('footer_script')
<script>
    $(document).ready(function() {
        $('#country_dropdown').select2();

        $('#country_dropdown').change(function(){
            var countryId = $('#country_dropdown').val();
            $('#city_dropdown').attr('disabled', false);

            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });

            $.ajax({
                type:'POST',
                url: '/get/city/list',
                data: {countryId:countryId},
                success:function(data){
                    $('#city_dropdown').html(data);
                }
            });
        });
        $('#city_dropdown').select2();
    });

</script>

@endsection


