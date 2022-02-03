@extends('layouts.app')
@section('breadcrumb')
    <div class="page-title-box">
        <h4 class="page-title">List-Category </h4>
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
                   <h3 class="text-info">List Category ( {{count($categorys)}} )</h3>
               </div>
               <div class="card-body">
                   <table class="table table-bordered">
                    <tr>
                        <th class="text-center font-weight-bold">SSL</th>
                        <th class="text-center font-weight-bold">Category Name</th>
                        <th class="text-center font-weight-bold">Category Image</th>
                        <th class="text-center font-weight-bold">Status</th>
                        <th class="text-center font-weight-bold">Action</th>
                    </tr>
                    @foreach ($categorys as $category)
                        <tr>
                            {{-- <td>
                                <input type="checkbox" class="form-control">
                            </td> --}}
                            <td>{{ ++$loop->index }}</td>
                            <td class="text-center font-weight-bold text-capitalize">{{ $category->category_name }}</td>
                            <td class="text-center">
                                <img width="200" src="{{ asset('images/category_photo').'/'.$category->category_image }}" alt="">
                            </td>
                            <td class="text-center"><span class="badge  badge-primary">{{ $category->status }}</span></td>
                            <td class="text-center">
                                <a href="{{ route('category.edit', $category->id) }}" class="btn btn-sm btn-info">Edit</a>
                                <form action="{{ route('category.destroy', $category->id) }}" method="POST">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-sm btn-danger mt-2" type="submit">Delete</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                   </table>
               </div>
           </div>
        </div>
    </div>
</div>
@endsection
