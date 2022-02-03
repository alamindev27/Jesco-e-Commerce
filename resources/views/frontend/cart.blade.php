@extends('layouts.app_frontend')
@section('content')
 <!-- breadcrumb-area start -->
 <div class="breadcrumb-area">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 text-center">
                <h2 class="breadcrumb-title">Cart</h2>
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="{{ route('frontend') }}">Home</a></li>
                    <li class="breadcrumb-item active">Cart</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>

<!-- breadcrumb-area end -->

<!-- Cart Area Start -->
<div class="cart-main-area pt-100px pb-100px">
    <div class="container">
        @if (session('finalSuccess'))
            <div class="alert alert-success">
                {{ session('finalSuccess') }}
            </div>
        @endif

        @if (session('stockError'))
            <div class="alert alert-danger">
                {{ session('stockError') }}
            </div>
        @endif
        <h3 class="cart-page-title">Your cart items</h3>
        <div class="row">
            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                <form action="{{ route('updateshopingcart') }}" method="post">
                    @csrf
                    <div class="table-content table-responsive cart-table-content">
                        <table>
                            <thead>
                                <tr>
                                    <th>Image</th>
                                    <th>Product Name</th>
                                    <th>Untit Price</th>
                                    <th>Qty</th>
                                    <th>Subtotal</th>
                                    <th>Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $carttotal = 0;
                                    $flag = false;
                                @endphp
                                @forelse (allcart() as $cart)
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="{{ route('productdetails', $cart->relationtoproduct->slug) }}">
                                                <img class="img-responsive ml-15px" src="{{ asset('images/product_image') }}/{{ $cart->relationtoproduct->product_iamge }}" alt="" />
                                            </a>
                                        </td>
                                        <td class="product-name">
                                            <a href="{{ route('productdetails', $cart->relationtoproduct->slug) }}">{{ $cart->relationtoproduct->product_name }}</a>
                                            <br> <span><b>Vendor Name:</b> {{ getvendorname($cart->vendor_id) }}</span>
                                            <br>
                                            @if ($cart->amount > available_quantity($cart->product_id))
                                                <p class="text-danger"><b>Stock Out</b></p>
                                                @php
                                                    $flag = true;
                                                @endphp
                                            @else
                                            <p class="text-success"><b>Available</b></p>
                                            @endif
                                        </td>
                                        <td class="product-price-cart"><span class="amount">${{ $cart->relationtoproduct->product_price }}</span></td>
                                        <td class="product-quantity">
                                            <div class="cart-plus-minus">
                                                <input class="cart-plus-minus-box" type="number" name="qtybutton[{{ $cart->id }}]" value="{{  $cart->amount }}" />
                                            </div>
                                        </td>
                                        <td class="product-subtotal">
                                            $ {{ $cart->amount*$cart->relationtoproduct->product_price }}
                                            @php
                                                $carttotal += $cart->amount*$cart->relationtoproduct->product_price
                                            @endphp
                                        </td>
                                        <td class="product-remove">
                                            <a href="#"><i class="fa fa-pencil"></i></a>
                                            <a href="{{ route('removecart', $cart->id) }}"><i class="fa fa-times"></i></a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr><td class="text-center">No Products adding to the cart</td></tr>
                                @endforelse
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="cart-shiping-update-wrapper">
                                <div class="cart-shiping-update">
                                    <a href="{{ route('frontend') }}">Continue Shopping</a>
                                </div>
                                <div class="cart-clear">
                                    <button type="submit">Update Shopping Cart</button>
                                    @auth
                                        <a href="{{ route('clearshopingcart', auth()->id() ) }}">Clear Shopping Cart</a>
                                    @endauth
                                </div>
                            </div>
                        </div>
                    </div>
                </form>
                <div class="row">
                    {{-- <div cs --}}
                    <div class="col-lg-6 col-md-12 mb-lm-30px">
                        @if (session('couponError'))
                            <div class="alert alert-danger">{{ session('couponError') }}</div>
                        @endif
                        <div class="discount-code-wrapper">
                            <div class="title-wrap">
                                <h4 class="cart-bottom-title section-bg-gray">Use Coupon Code</h4>
                            </div>
                            <div class="discount-code">
                                <p>Enter your coupon code if you have one.</p>
                                <form>
                                    <input type="text"  name="coupon_name" value="{{ $coupon_name ? $coupon_name : '' }}" />
                                    <button class="cart-btn-2" type="submit">Apply Coupon</button>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-6 col-md-12 mt-md-30px">
                        <div class="grand-totall">
                            <div class="title-wrap">
                                <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                            </div>
                            @php
                                if ($coupon_name)
                                {
                                    Session::put('s_coupon_name', $coupon_name);
                                }
                                else
                                {
                                    Session::put('s_coupon_name', '');
                                }

                                Session::put('s_cart_total', $carttotal);
                                Session::put('s_discount_total', $discount_total);

                            @endphp
                            <h5>Cart Total <span>${{ $carttotal }}</span></h5>
                            <h5>Discount Total
                            @if ($coupon_name)
                                ( {{ $coupon_name }} )
                            @else
                                ( {{ 'N/A' }} )
                            @endif <span>${{ $discount_total }}</span></h5>
                            <h5>Sub Total (Rounded) <span id="sub_total">{{ round($carttotal-$discount_total) }}</span><span>$</span> </h5>
                            <div class="total-shipping">
                                <h5>Total shipping</h5>
                                <ul>
                                    <li><input id="shipping_1" type="radio" name="shipping" /> Standard <span>$20.00</span></li>
                                    <li><input id="shipping_2" type="radio" name="shipping" /> Express <span>$30.00</span></li>
                                    <li><input id="shipping_3" type="radio" name="shipping" /> Free Shiping <span>$00</span></li>
                                </ul>
                            </div>
                            <h4 class="grand-totall-title">Grand Total <span id="grand_total">{{ round($carttotal-$discount_total) }}</span><span>$</span></h4>

                            @if ($flag)
                                <a style="background:#ddd; cursor: pointer; color:#000">Pleade, Stock Out Product Remove </a>
                            @else
                                <a href="{{ route('checkout') }}" id="checkout_btn" class="d-none">Proceed to Checkout</a>
                                <a id="alert_checkout" class="" disabled>Select Shipping Your Option</a>
                            @endif
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Cart Area End -->
@endsection

@section('footer_script')
<script>
    $('#shipping_1').click(function(){
        $('#grand_total').html(parseInt($('#sub_total').html())+20);
        $('#checkout_btn').removeClass('d-none');
        $('#alert_checkout').addClass('d-none');
        @php
            session(['shipping' => 0]);
        @endphp

    });

    $('#shipping_2').click(function(){
        $('#grand_total').html(parseInt($('#sub_total').html())+30);
        $('#checkout_btn').removeClass('d-none');
        $('#alert_checkout').addClass('d-none');
        @php
            session(['shipping' => 30]);
        @endphp
    });

    $('#shipping_3').click(function(){
        $('#grand_total').html(parseInt($('#sub_total').html())+0);
        $('#checkout_btn').removeClass('d-none');
        $('#alert_checkout').addClass('d-none');
        @php
            session(['shipping' => 0]);
        @endphp
    });
</script>

@endsection
