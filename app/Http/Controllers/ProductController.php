<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use App\Models\Product_thumbnails;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
       return view('products.index',[
           'products' => Product::where('user_id', Auth::user()->id)->get(),
       ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create', [
            'active_categorys' => Category::where('status', 'show')->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'product_name' => 'required',
            'product_price' => 'required',
            'product_sort_description' => 'required',
            'product_long_description' => 'required',
            'product_code' => 'required',
            'product_iamge' => 'required | image',
            'product_quantity' => 'required | numeric | min:1',
            'product_thumbnails' => 'required ',
        ]);
            $new_image_name = Str::random(10).'-'.time().'-'.$request->product_code.'.'.$request->file('product_iamge')->getClientOriginalExtension();
            Image::make($request->file('product_iamge'))->resize(270, 310)->save(base_path('public/images/product_image/'.$new_image_name));
            $slug = Str::slug($request->product_name).'-'.Str::random(5).'-'.Auth::user()->id;
            $product_id = Product::insertGetId([
            'user_id' => Auth::user()->id,
            'category_name' => $request->category_name,
            'product_name' => $request->product_name,
            'product_price' => $request->product_price,
            'product_sort_description' => $request->product_sort_description,
            'product_long_description' => $request->product_long_description,
            'product_code' => $request->product_code,
            'product_iamge' => $new_image_name,
            'product_quantity' => $request->product_quantity,
            'slug' => $slug,
            'created_at' => Carbon::now()
        ]);
        foreach ($request->file('product_thumbnails') as $product_thumbnail) {
            // print_r($product_thumbnail);
            $new_image_name = $product_id.'-'.Str::random(10).'.'.$product_thumbnail->getClientOriginalExtension();
            Image::make($product_thumbnail)->resize(800, 800)->save(base_path('public/images/product_thumbnails/'.$new_image_name));
            Product_thumbnails::insert([
                'product_id' => $product_id,
                'product_thumbails' => $new_image_name,
                'created_at' => Carbon::now()
            ]);
        }
        return back()->with('Productsuccess', 'Product added successfull.');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
}
