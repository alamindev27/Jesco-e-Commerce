@extends('layouts.app')
@section('breadcrumb')
    <div class="page-title-box">
        <h4 class="page-title">Add-Products </h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        </ol>
    </div>
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            @if (session('Productsuccess'))
                <div class="alert alert-success">
                    {{ session('Productsuccess') }}
                </div>
            @endif
            <div class="card-header">Add Products</div>
            <div class="card-body">
                <form action="{{ route('products.store') }}" enctype="multipart/form-data" method="post" class="form">
                    @csrf
                    <div class="form-group">
                        <label>Category</label>
                        <select name="category_name" class="form-control">
                            <option value="">--Select</option>
                            @foreach ($active_categorys as $category)
                                <option value="{{ $category->id }}">{{ $category->category_name }}</option>
                            @endforeach
                        </select>
                        <span class="text-danger">
                            @error('category_name')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label>Product Name</label>
                        <input type="text" name="product_name" value="{{ old('product_name') }}" placeholder="Enter product name" class="form-control">
                        <span class="text-danger">
                            @error('product_name')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label>Product Price</label>
                        <input type="number" name="product_price" value="{{ old('product_price') }}" placeholder="Enter product price" class="form-control">
                        <span class="text-danger">
                            @error('product_price')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label>Product Sort Description</label>
                        <textarea name="product_sort_description" placeholder="Enter product sort description" class="form-control" rows="3">{{ old('product_sort_description') }}</textarea>
                        <span class="text-danger">
                            @error('product_sort_description')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label>Product Long Description</label>
                        <textarea name="product_long_description" class="form-control" rows="5">{{ old('product_long_description') }}</textarea>
                        <span class="text-danger">
                            @error('product_long_description')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label>Product Code</label>
                        <input type="text" name="product_code" value="{{ old('product_code') }}" placeholder="Enter product code" class="form-control">
                        <span class="text-danger">
                            @error('product_code')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label>Product Quantity</label>
                        <input type="number" name="product_quantity" value="{{ old('product_quantity') }}" placeholder="Enter product quantity" class="form-control">
                        <span class="text-danger">
                            @error('product_quantity')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label>Product Image</label>
                        <input type="file" name="product_iamge" value="" class="form-control">
                        <span class="text-danger">
                            @error('product_iamge')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label>Product Thumbnails</label>
                        <input multiple type="file" name="product_thumbnails[]" value="" class="form-control">
                        <span class="text-danger">
                            @error('product_thumbnails')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-sm btn-success" value="Add Product">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

