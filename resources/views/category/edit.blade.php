@extends('layouts.app')
@section('breadcrumb')
    <div class="page-title-box">
        <h4 class="page-title">Edit-Category </h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        </ol>
    </div>
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Edit Category</div>
            <div class="card-body">
                <form action="{{ route('category.update',$category->id) }}" enctype="multipart/form-data" method="post" class="form">
                    @csrf
                    @method('PATCH')
                    <div class="form-group">
                        <label>Status</label>
                        <span class="text-danger">
                            <select name="status" class="form-control">
                                <option value="">--Select-</option>
                                <option value="show" {{ $category->status == 'show' ? 'selected' : '' }}>Show</option>
                                <option value="hide" {{ $category->status == 'hide' ? 'selected' : '' }}>Hide</option>
                            </select>
                            {{-- @error('category_name')
                                {{ $message }}
                            @enderror --}}
                        </span>
                    </div>
                    <div class="form-group">
                        <label>Category Name</label>
                        <input type="text" name="category_name" value="{{ $category->category_name }}" placeholder="Enter category name" class="form-control">
                        <span class="text-danger">
                            @error('category_name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label>Category Image</label>
                        <input type="file" name="new_category_iamge" value=""  class="form-control">
                    </div>
                    <img width="150" src="{{ asset('images/category_photo').'/'.$category->category_image }}" alt="">
                    <div class="form-group mt-2">
                        <input type="submit" class="btn btn-sm btn-success" value="Edit {{ $category->category_name }} Category">
                    </div>
                </form>
            </div>
        </div>



    </div>

</div>
@endsection
