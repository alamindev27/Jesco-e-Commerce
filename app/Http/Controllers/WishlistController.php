<?php

namespace App\Http\Controllers;

// use App\Models\Product;
use App\Models\Wishlist;
use Carbon\Carbon;
use Illuminate\Http\Request;

class WishlistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('wishlist.index',[
            'wishlists' => Wishlist::where('user_id', auth()->id())->get(),
        ]);
    }

    public function insert($product_id)
    {
        Wishlist::insert([
            'user_id' => auth()->user()->id,
            'product_id' =>$product_id,
            'created_at' => Carbon::now()
        ]);
        return back();
    }

    public function remove($wishlist_id)
    {
        Wishlist::find($wishlist_id)->delete();
        return back();
    }
}
