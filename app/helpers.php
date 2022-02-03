<?php

use App\Models\Cart;
use App\Models\Product;
use App\Models\User;
use App\Models\Wishlist;



function allwishlist()
{
    return Wishlist::where('user_id', auth()->id())->get();
}


function allcart()
{
    return Cart::where('user_id', auth()->id())->get();
}


function allcartcount()
{
    return count(Cart::where('user_id', auth()->id())->get());
}
function getvendorname($vendor_id)
{
    return User::find($vendor_id)->name;
}
function available_quantity($product_id)
{
    return Product::find($product_id)->product_quantity;
}
