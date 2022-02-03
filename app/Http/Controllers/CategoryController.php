<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;
use Intervention\Image\Facades\Image;
// use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{

    public function index()
    {
        return view('category.index', [
            'categorys' => Category::orderby('id', 'DESC')->get(),
        ]);
    }

    public function create()
    {
        return view('category.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'category_iamge' => 'required | image',
        ]);

       $image_name = Auth::id().'-'.time().'-'.Str::random(10).'.'.$request->file('category_iamge')->getClientOriginalExtension();
        Image::make($request->file('category_iamge'))->resize(600, 328)->save(base_path('public/images/category_photo/'.$image_name));
        Category::insert([
            'category_name' => $request->category_name,
            'category_image' => $image_name,
            'created_at' => Carbon::now(),
        ]);
        return back()->with('CategorySuccess' , 'Category added successfully.');
    }

    public function show($id)
    {
        //
    }


    public function edit($id)
    {
        $category = Category::find($id);
        return view('category.edit', compact('category'));
    }


    public function update(Request $request, $id)
    {



        $request->validate([
            'category_name' => 'required',
            'new_category_iamge' => 'image',
        ]);
        if($request->hasFile('new_category_iamge'))
        {
            $update_image_name = Auth::id().'-'.time().'-'.Str::random(10).'.'.$request->file('new_category_iamge')->getClientOriginalExtension();
            unlink(base_path('public/images/category_photo/'.Category::find($id)->category_image));
            $new_image_name = Auth::id().'.'.$request->file('new_category_iamge')->getClientOriginalExtension();
            Image::make($request->file('new_category_iamge'))->resize(600, 328)->save(base_path('public/images/category_photo/'.$update_image_name));
            Category::find($id)->update([
                'category_image' => $update_image_name,
            ]);
        }
        Category::find($id)->update([
            'category_name' => $request->category_name,
            'status' => $request->status,
        ]);
        // return back()->with('UpdateCategorysuccess', 'Category update successfyly');
        return redirect()->route('category.index')->with('UpdateCategorysuccess', 'Category update successfyly');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        unlink(base_path('public/images/category_photo/'.$category->category_image));
        $category->delete();
        return back()->with('deleteSuccessForCategory', 'Category Delete Successfully.');
    }





}
