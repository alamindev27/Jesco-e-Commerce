<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Wishlist;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        if(Category::where('status', 'show')->count() > 0 )
        {
            $categorys = Category::where('status', 'show')->limit(6)->get();
        }
        else
        {
            $categorys = Category::latest()->limit(3)->get();
        }
        $allproducts = Product::all();
        return view('frontend.index', compact('categorys', 'allproducts'));
    }
    public function productdetails($slug)
    {
        $wishlist_status = Wishlist::where('user_id',auth()->id())->where('product_id', Product::where('slug', $slug)->first()->id)->exists();
        if($wishlist_status)
        {
            $wishlist_id = Wishlist::where('user_id',auth()->id())->where('product_id', Product::where('slug', $slug)->first()->id)->first()->id;
        }
        else
        {
            $wishlist_id = "";
        }

        return view('frontend.productdetails',[
            'singleproduct' => Product::where('slug', $slug)->firstorFail(),
            'reletad_products' => Product::where('slug', '!=', $slug)->where('category_name', Product::where('slug', $slug)->firstorFail()->category_name)->get(),
            'wishlist_status' => $wishlist_status,
            'wishlist_id' => $wishlist_id,
        ]);
    }
    public function categorywayesproduct ($id)
    {
       return view('frontend.categorywayesproduct',[
           'all_count' => Product::all()->count(),
            'products' => Product::where('category_name', $id)->get(),
            'category_name' => Category::find($id)->category_name,
        ]);
    }
}
