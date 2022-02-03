@extends('layouts.app')
@section('breadcrumb')
    <div class="page-title-box">
        <h4 class="page-title">Add-Category </h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        </ol>
    </div>
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Add Category</div>
            <div class="card-body">
                <form action="{{ route('category.store') }}" enctype="multipart/form-data" method="post" class="form">
                    @csrf
                        <label>Category Name</label>
                        <input type="text" name="category_name" value="" placeholder="Enter category name" class="form-control">

                    </div>
                    <div class="form-group">
                        <label>Category Image</label>
                        <input type="file" name="category_iamge" value="" class="form-control">

                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-sm btn-success" value="Add Category">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

