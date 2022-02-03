@extends('layouts.app')
@section('breadcrumb')
    <div class="page-title-box">
        <h4 class="page-title">Add-Location </h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        </ol>
    </div>
@endsection
@section('content')
<div class="row justify-content-center">
    <div class="col-md-8">
        <div class="card">
            <div class="card-header">Add Location</div>
            <div class="card-body">
                <form action="{{ route('location.update') }}" method="post" class="form">
                    @csrf
                        {{-- <label>Category Name</label> --}}
                        <select name="countries[]" id="country_dropdown" multiple="multiple" class="form-control">
                            @foreach ($countries as $country)
                                <option {{ $country->status == 'active' ? 'selected' : '' }} value="{{ $country->id }}">{{ $country->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <input type="submit" class="btn btn-sm btn-success" value="Add Country">
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
@section('footer_script')
    <script>
        $(document).ready(function() {
            $('#country_dropdown').select2();
        });
    </script>
@endsection


