@extends('layouts.app')
@section('breadcrumb')
    <div class="page-title-box">
        <h4 class="page-title">Add-Coupon </h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        </ol>
    </div>
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="card">
            <div class="card-header">Add Coupon</div>
                <div class="card-body">
                    <form action="{{ route('coupon.store') }}" method="POST" class="form">
                        @csrf
                        <div class="form-group">
                            <label>Category Name</label>
                            <input type="text" name="coupon_name" value="{{ old('coupon_name') }}" placeholder="Enter coupon name" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Coupon Discount Persentence</label>
                            <input type="number" name="discount_persentence" value="{{ old('discount_persentence') }}" placeholder="Enter coupon discont persentence" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Coupon Validity</label>
                            <input type="date" name="validity" value="{{ old('validity') }}" class="form-control">
                        </div>
                        <div class="form-group">
                            <label>Coupon Limit</label>
                            <input type="number" name="limit" value="{{ old('limit') }}" placeholder="Enter coupon limit" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" class="btn btn-sm btn-success" value="Add Coupon">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

