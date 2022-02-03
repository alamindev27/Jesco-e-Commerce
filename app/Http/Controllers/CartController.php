<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Wishlist;
use App\Models\Cart;
use App\Models\Coupon;
use App\Models\Product;
use Carbon\Carbon;

class CartController extends Controller
{
    public function addtocartwishlist($wishlist_id)
    {
        $vendor_id = Product::find(Wishlist::find($wishlist_id)->product_id)->user_id;
        if(Cart::where('user_id', auth()->id())->where('product_id', Wishlist::find($wishlist_id)->product_id)->exists())
        {
            Cart::where('user_id', auth()->id())->where('product_id', Wishlist::find($wishlist_id)->product_id)->increment('amount', 1);
        }
        else{
            Cart::insert([
                'user_id' => auth()->id(),
                'vendor_id' => $vendor_id,
                'product_id' => Wishlist::find($wishlist_id)->product_id,
                'created_at' => Carbon::now(),
            ]);
        }
        Wishlist::find($wishlist_id)->delete();
        return back();
    }
    public function addtocart(Request $request , $product_id)
    {
        if(Product::find($product_id)->product_quantity < $request->qtybutton)
        {
            return back()->with('stockError','Stock not abaleable');
        }
        else{
            if(Cart::where('user_id', auth()->id())->where('product_id', $product_id)->exists())
            {
                if(Product::find($product_id)->product_quantity < (Cart::where('user_id', auth()->id())->where('product_id', $product_id)->first()->amount + $request->qtybutton))
                {
                    return back()->with('stockError','Already addet to cart');
                }
                else{
                    Cart::where('user_id', auth()->id())->where('product_id', $product_id)->increment('amount', $request->qtybutton);
                }
            }
            else{
                Cart::insert([
                    'user_id' => auth()->id(),
                    'vendor_id' => Product::find($product_id)->user_id,
                    'product_id' => $product_id,
                    'amount' => $request->qtybutton,
                    'created_at' => Carbon::now()
                ]);
            }
        }
        return back();
    }



    public function cart ()
    {
        if(isset($_GET['coupon_name']))
        {
            if($_GET['coupon_name'])
            {
                $coupon_name = $_GET['coupon_name'];
                if(Coupon::where('coupon_name', $coupon_name)->exists())
                {
                    $coupon_info = Coupon::where('coupon_name', $coupon_name)->first();
                    if($coupon_info->limit != 0)
                    {
                        if(Carbon::today()->format('Y-m-d') > $coupon_info->validity )
                        {
                            $discount_total = 0;
                            return redirect('cart')->with('couponError', $coupon_name . ' This Coupon Validity is Over.');
                        }
                        else
                        {
                            $discount_total = (session('s_cart_total') * $coupon_info->discount_persentence) / 100;

                        }

                    }
                    else
                    {
                        $discount_total = 0;
                        return redirect('cart')->with('couponError', $coupon_name . ' This Coupon Limit is Over.');
                    }
                    // $coupon_name = $_GET['coupon_name'];
                    // $discount_total = 180;
                }
                else
                {
                    $discount_total = 0;
                    return redirect('cart')->with('couponError', $coupon_name.' Coupon Not Available');
                }
            }
            else
            {
                $coupon_name = '';
                $discount_total = 0;
            }
        }
        else
        {
            $coupon_name = '';
            $discount_total = 0;
        }
        if(auth()->user())
        {
            return view('frontend.cart', compact('discount_total', 'coupon_name'));
        }
        else{
            abort(404);
        }
    }










    public function clearshopingcart ($user_id)
    {
        Cart::where('user_id', $user_id)->delete();
        return back();
    }
    public function removecart($cart_id)
    {
        Cart::find($cart_id)->delete();
        return back();
    }
    public function updateshopingcart (Request $request)
    {
        foreach ($request->qtybutton as $cart_id => $updated_amount)
        {
            if (Product::find($cart_id)->product_quantity < $updated_amount) {
                return back()->with('stockError', 'Stock not abaleable');
            }
            Cart::find($cart_id)->update([
                'amount' => $updated_amount,
            ]);
        }
        return back();
    }







}
