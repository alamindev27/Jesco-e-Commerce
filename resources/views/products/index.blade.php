@extends('layouts.app')
@section('breadcrumb')
    <div class="page-title-box">
        <h4 class="page-title">Product-List </h4>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="{{ route('home') }}">Home</a></li>
        </ol>
    </div>
@endsection
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-12">
            @if (session('deleteSuccessForCategory'))
                <div class="alert alert-danger">
                    {{ session('deleteSuccessForCategory') }}
                </div>
            @endif
           <div class="card">
            @if (session('UpdateCategorysuccess'))
                <div class="alert alert-success">
                    {{ session('UpdateCategorysuccess') }}
                </div>
            @endif
               <div class="card-header">
                   <h3 class="text-info">List Category (  )</h3>
               </div>
               <div class="card-body">
                   <table class="table table-bordered">
                    <tr>
                        <th class="text-center font-weight-bold">SSL</th>
                        <th class="text-center font-weight-bold">Product Name</th>
                        <th class="text-center font-weight-bold">Product Price</th>
                    @foreach ($products as $product)
                        <tr>
                            {{-- <td>
                                <input type="checkbox" class="form-control">
                            </td> --}}
                            <td>{{ ++$loop->index }}</td>
                            <td class="font-weight-bold text-capitalize">{{ $product->product_name }}</td>
                            <td class="text-center font-weight-bold text-capitalize">{{ $product->product_price }}Tk</td>

                        </tr>
                    @endforeach
                   </table>
               </div>
           </div>
        </div>
    </div>
</div>
@endsection
