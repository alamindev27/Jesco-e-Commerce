@extends('layouts.app_auth')
@section('adminform')
    <form method="POST" action="{{ route('login') }}">
        @csrf
        <div class="form-group m-b-20 row">
            <div class="col-12">
                <label for="emailaddress">Email address</label>
                <input class="form-control @error('email') is-invalid @enderror" type="text" id="emailaddress" name="email" placeholder="Enter your email">
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row m-b-20">
            <div class="col-12">

                <label for="password">Password</label>
                <input class="form-control @error('password') is-invalid @enderror" type="password" name="password" id="password" placeholder="Enter your password">
                @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
            </div>
        </div>

        <div class="form-group row m-b-20">
            <div class="col-12">

                <div class="checkbox checkbox-custom">
                    <input id="remember" type="checkbox" name="remember" checked="">
                    <label for="remember">
                        {{ __('Remember Me') }}
                    </label>
                </div>

            </div>
        </div>

        <div class="form-group row text-center m-t-10">
            <div class="col-12">
                <button class="btn btn-block btn-custom waves-effect waves-light" type="submit">Sign In</button>
            </div>
        </div>

    </form>
    <a href="page-recoverpw.html" class="text-muted pull-right"><small>Forgot your password?</small></a>
    <div class="row m-t-50">
        <div class="col-sm-12 text-center">
            <p class="text-muted">Don't have an account? <a href="{{ route('register') }}" class="text-dark m-l-5"><b>Sign Up</b></a></p>
        </div>
    </div>
@endsection
