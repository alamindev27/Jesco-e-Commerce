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
            @if (session('vendorSuccess'))
                <div class="alert alert-success">
                    {{ session('vendorSuccess') }}
                </div>
            @endif

            <div class="card-header">Add-Vendor</div>
            <div class="card-body">
                <form action="{{ route('vendor.store') }}" enctype="multipart/form-data" method="post" class="form">
                    @csrf
                    <div class="form-group">
                        <label>Vendor Name</label>
                        <input type="text" name="vendor_name" value="{{ old('vendor_name') }}" placeholder="Enter vendor name" class="form-control">
                        <span class="text-danger">
                            @error('vendor_name')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label>Vendor Email</label>
                        <input type="text" name="vendor_email" value="{{ old('vendor_email') }}" placeholder="Enter vendor email" class="form-control">
                        <span class="text-danger">
                            @error('vendor_email')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label>Vendor Phone</label>
                        <input type="text" name="vendor_phone" value="{{ old('vendor_phone') }}" placeholder="Enter vendor phone number" class="form-control">
                        <span class="text-danger">
                            @error('vendor_phone')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label>Vendor Address</label>
                        <textarea name="vendor_address" placeholder="Enter vendor address" class="form-control" rows="3">{{ old('vendor_address') }}</textarea>
                        <span class="text-danger">
                            @error('vendor_address')
                            {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-sm btn-success" value="Add Vendor">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection

