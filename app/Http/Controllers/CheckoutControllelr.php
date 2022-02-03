<?php

namespace App\Http\Controllers;

use App\Models\Billing_details;
use App\Models\Cart;
use App\Models\City;
use App\Models\Country;
use App\Models\Coupon;
use App\Models\Order_dateil;
use App\Models\Order_summery;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CheckoutControllelr extends Controller
{
    public function checkout()
    {
        if(strpos(url()->previous(), 'cart') || strpos(url()->previous(), 'checkout'))
        {
            return view('checkout.checkout',[
                'countris' => Country::orderBy('name', 'ASC')->where('status', 'active')->get(['id', 'name'])
            ]);
        }
        else
        {
            abort(404);
        }
    }

    public function checkout_post(Request $request)
    {
        $request->validate([
            '*' => 'required',
            'order_note' => 'nullable'
        ]);

        $order_summery_id = Order_summery::insertGetId([
            'user_id' => auth()->id(),
            'coupon_name' => session('s_coupon_name'),
            'cart_total' => session('s_cart_total'),
            'discount_total' => session('s_discount_total'),
            'sub_total' => session('s_cart_total') - session('s_discount_total'),
            'shiping' => 60,
            'grand_total' => round(session('s_cart_total') - session('s_discount_total')) + 60,
            'payment_potion' => $request->payment_option,
            'created_at' => Carbon::now()
        ]);

        Billing_details::insert([
            'order_summery_id' => $order_summery_id,
            'name' => $request->name,
            'email' => $request->email,
            'phone_number' => $request->phone_number,
            'country_id' => $request->country,
            'city_id' => $request->city,
            'address' => $request->address,
            'post_code' => $request->post_code,
            'order_note' => $request->order_note,
            'created_at' => Carbon::now()
        ]);
        foreach (allcart() as $cart) {
            Order_dateil::insert([
                'order_summery_id' => $order_summery_id,
                'vendor_id' => $cart->vendor_id,
                'product_id' => $cart->product_id,
                'amount' => $cart->amount,
                'created_at' => Carbon::now()
            ]);
            // product table theke delete kora
            Product::find($cart->product_id)->decrement('product_quantity', $cart->amount);

            // delete form cart
            Cart::find($cart->id)->delete();
        }
        if(session('s_coupon_name'))
        {
            Coupon::where('coupon_name', session('s_coupon_name'))->decrement('limit', 1);
        }


        if($request->payment_option == 1)
        {
            return redirect('cart')->with('finalSuccess', 'Your Order Successfully');
        }
        else
        {
            return redirect('pay');
        }


    }

    public function get_city_list(Request $request)
    {
        $string_to_show = "<option value=''>---Select a City</option>";
        foreach (City::where('country_id', $request->countryId)->get(['id', 'name']) as $city) {
            echo $string_to_show = "<option value='$city->id'>$city->name</option>";
        }
        echo $string_to_show;
    }

}


