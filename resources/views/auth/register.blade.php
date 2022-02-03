@extends('layouts.app_auth')
@section('adminform')

<form class="form-horizontal" method="POST" action="{{ route('register') }}">
    @csrf
    <div class="form-group row m-b-20">
        <div class="col-12">
            <label for="username">Name<span class="text-danger">*</span></label>
            <input class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" type="text" id="username" placeholder="Enter your name">
            @error('name')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row m-b-20">
        <div class="col-12">
            <label for="emailaddress">Email address<span class="text-danger">*</span></label>
            <input class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" type="text" id="emailaddress" placeholder="Enter your email">
            @error('email')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>
    <div class="form-group row m-b-20">
        <div class="col-12">
            <label>Phone</label>
            <input class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" type="text" placeholder="Enter your phoen">
            @error('phone')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row m-b-20">
        <div class="col-12">
            <label for="password">Password<span class="text-danger">*</span></label>
            <input class="form-control  @error('password') is-invalid @enderror" name="password" type="password" id="password" placeholder="Enter your password">
            @error('password')
                <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                </span>
            @enderror
        </div>
    </div>

    <div class="form-group row m-b-20">
        <div class="col-12">
            <label for="password">Confirm Password<span class="text-danger">*</span></label>
            <input class="form-control" name="password_confirmation" type="password" id="password" placeholder="Enter your confirm password">

        </div>
    </div>

    <div class="form-group row text-center m-t-10">
        <div class="col-12">
            <button class="btn btn-block btn-custom waves-effect waves-light" type="submit">Sign Up Free</button>
        </div>
    </div>

</form>

<div class="row m-t-50">
    <div class="col-sm-12 text-center">
        <p class="text-muted">Already have an account?  <a href="{{ route('login') }}" class="text-dark m-l-5"><b>Sign In</b></a></p>
    </div>
</div>
@endsection
