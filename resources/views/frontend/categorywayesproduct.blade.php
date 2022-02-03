@extends('layouts.app_frontend')
@section('content')
 <!-- breadcrumb-area start -->
 <div class="breadcrumb-area">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 text-center">
                <h2 class="breadcrumb-title">{{ $category_name }}</h2>
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                    <li class="breadcrumb-item active">{{ $category_name }}</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>

<!-- breadcrumb-area end -->

<!-- Shop Page Start  -->
<div class="shop-category-area pt-100px pb-100px">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <!-- Shop Top Area Start -->
                <div class="shop-top-bar d-flex">
                    <!-- Left Side start -->
                    <p><span>{{ count($products) }}</span> Product Found of <span>30</span></p>
                    <!-- Left Side End -->
                    <div class="shop-tab nav">
                        <a class="active" href="#shop-grid" data-bs-toggle="tab">
                            <i class="fa fa-th" aria-hidden="true"></i>
                        </a>
                        <a href="#shop-list" data-bs-toggle="tab">
                            <i class="fa fa-list" aria-hidden="true"></i>
                        </a>
                    </div>
                    <!-- Right Side Start -->
                    <div class="select-shoing-wrap d-flex align-items-center">
                        <div class="shot-product">
                            <p>Sort By:</p>
                        </div>
                        <div class="shop-select">
                            <select class="shop-sort">
                                <option data-display="Relevance">Relevance</option>
                                <option value="1"> Name, A to Z</option>
                                <option value="2"> Name, Z to A</option>
                                <option value="3"> Price, low to high</option>
                                <option value="4"> Price, high to low</option>
                            </select>

                        </div>
                    </div>
                    <!-- Right Side End -->
                </div>
                <!-- Shop Top Area End -->

                <!-- Shop Bottom Area Start -->
                <div class="shop-bottom-area">

                    <!-- Tab Content Area Start -->
                    <div class="row">
                        <div class="col">
                            <div class="tab-content">
                                <div class="tab-pane fade show active" id="shop-grid">
                                    <div class="row mb-n-30px">
{{--
                                        <div class="col-lg-3 col-md-4 col-sm-6 col-xs-6 mb-30px" data-aos="fade-up"
                                            data-aos-delay="200">
                                            <!-- Single Prodect -->
                                            <div class="product">
                                                <div class="thumb">
                                                    <a href="single-product.html" class="image">
                                                        <img src="assets/images/product-image/1.jpg"
                                                            alt="Product" />
                                                        <img class="hover-image"
                                                            src="assets/images/product-image/1.jpg" alt="Product" />
                                                    </a>
                                                    <span class="badges">
                                                        <span class="new">New</span>
                                                    </span>
                                                    <div class="actions">
                                                        <a href="wishlist.html" class="action wishlist"
                                                            title="Wishlist"><i class="pe-7s-like"></i></a>
                                                        <a href="#" class="action quickview"
                                                            data-link-action="quickview" title="Quick view"
                                                            data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                                                class="pe-7s-search"></i></a>
                                                        <a href="compare.html" class="action compare"
                                                            title="Compare"><i class="pe-7s-refresh-2"></i></a>
                                                    </div>
                                                    <button title="Add To Cart" class=" add-to-cart">Add
                                                        To Cart</button>
                                                </div>
                                                <div class="content">
                                                    <span class="ratings">
                                                        <span class="rating-wrap">
                                                            <span class="star" style="width: 100%"></span>
                                                        </span>
                                                        <span class="rating-num">( 5 Review )</span>
                                                    </span>
                                                    <h5 class="title"><a href="single-product.html">Women's
                                                            Elizabeth Coat
                                                        </a>
                                                    </h5>
                                                    <span class="price">
                                                        <span class="new">$38.50</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div> --}}
                                    @foreach ($products as $product)
                                        {{-- <div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px" data-aos="fade-up"
                                            data-aos-delay="200">
                                            <!-- Single Prodect -->
                                            <div class="product">
                                                <div class="thumb">
                                                    <a href="single-product.html" class="image">
                                                        <img src="{{ asset('images/product_image/').'/'.$product->product_iamge  }}" alt="Product" />
                                                    </a>
                                                    <span class="badges">
                                                        <span class="new">New</span>
                                                    </span>
                                                    <div class="actions">
                                                        <a href="wishlist.html" class="action wishlist" title="Wishlist"><i
                                                                class="pe-7s-like"></i></a>
                                                        <a href="#" class="action quickview" data-link-action="quickview"
                                                            title="Quick view" data-bs-toggle="modal"
                                                            data-bs-target="#exampleModal"><i class="pe-7s-search"></i></a>
                                                        <a href="compare.html" class="action compare" title="Compare"><i
                                                                class="pe-7s-refresh-2"></i></a>
                                                    </div>
                                                    <button title="Add To Cart" class=" add-to-cart">Add
                                                        To Cart</button>
                                                </div>
                                                <div class="content">
                                                    <span class="ratings">
                                                        <span class="rating-wrap">
                                                            <span class="star" style="width: 100%"></span>
                                                        </span>
                                                        <span class="rating-num">( 5 Review )</span>
                                                    </span>
                                                    <h5 class="title"><a href="{{ url('product/details')}}/{{ $product->slug }}">{{ $product->product_name }}</a>
                                                    </h5>
                                                    <span class="price">
                                                        <span class="new">{{ $product->product_price }}Tk</span>
                                                    </span>
                                                </div>
                                            </div>
                                        </div> --}}
                                        @include('parts.product_thumb')
                                    @endforeach
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="shop-list">
                                    @foreach ($products as $product)
                                    <div class="shop-list-wrapper">
                                        <div class="row">
                                            <div class="col-md-5 col-lg-5 col-xl-4">
                                                <div class="product">
                                                    <div class="thumb">
                                                        <a href="{{ url('product/details')}}/{{ $product->slug }}" class="image">
                                                            <img src="{{ asset('images/product_image').'/'.$product->product_iamge  }}"
                                                                alt="Product" />
                                                        </a>
                                                        <span class="badges">
                                                            <span class="new">New</span>
                                                        </span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-7 col-lg-7 col-xl-8">
                                                <div class="content-desc-wrap">
                                                    <div class="content">
                                                        <span class="ratings">
                                                            <span class="rating-wrap">
                                                                <span class="star" style="width: 100%"></span>
                                                            </span>
                                                            <span class="rating-num">( 5 Review )</span>
                                                        </span>
                                                        <h5 class="title"><a href="{{ url('product/details')}}/{{ $product->slug }}">{{$product->product_name}}</a></h5>
                                                        <p>{{$product->product_sort_description }}</p>
                                                    </div>
                                                    <div class="box-inner">
                                                        <span class="price">
                                                            <span class="new">{{$product->product_price }} Tk</span>
                                                        </span>
                                                        <div class="actions">
                                                            <a href="wishlist.html" class="action wishlist"
                                                                title="Wishlist"><i class="pe-7s-like"></i></a>
                                                            <a href="#" class="action quickview"
                                                                data-link-action="quickview" title="Quick view"
                                                                data-bs-toggle="modal"
                                                                data-bs-target="#exampleModal"><i
                                                                    class="pe-7s-search"></i></a>
                                                            <a href="compare.html" class="action compare"
                                                                title="Compare"><i class="pe-7s-refresh-2"></i></a>
                                                        </div>
                                                        <button title="Add To Cart" class=" add-to-cart">Add
                                                            To Cart</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Tab Content Area End -->

                    <!--  Pagination Area Start -->
                    <div class="load-more-items text-center mt-30px0px" data-aos="fade-up">
                        <a href="#" class="btn btn-lg btn-primary btn-hover-dark m-auto"> Load More <i
                                class="fa fa-refresh ml-15px" aria-hidden="true"></i></a>
                    </div>
                    <!--  Pagination Area End -->
                </div>
                <!-- Shop Bottom Area End -->
            </div>
        </div>
    </div>
</div>
<!-- Shop Page End  -->
@endsection
