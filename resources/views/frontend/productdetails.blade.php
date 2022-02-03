@extends('layouts.app_frontend')
@section('content')
<!-- breadcrumb-area start -->
<div class="breadcrumb-area">
    <div class="container">
        <div class="row align-items-center justify-content-center">
            <div class="col-12 text-center">
                <h2 class="breadcrumb-title">Products</h2>
                <!-- breadcrumb-list start -->
                <ul class="breadcrumb-list">
                    <li class="breadcrumb-item">
                        <a href="{{ route('frontend') }}">Home</a>
                    </li>
                    <li class="breadcrumb-item active">{{ $singleproduct->product_name }}</li>
                </ul>
                <!-- breadcrumb-list end -->
            </div>
        </div>
    </div>
</div>

<!-- breadcrumb-area end -->

<!-- Product Details Area Start -->
<div class="product-details-area pt-100px pb-100px">
    <div class="container">
        <div class="row">
            <div class="col-lg-6 col-sm-12 col-xs-12 mb-lm-30px mb-md-30px mb-sm-30px">
                <!-- Swiper -->
                <div class="swiper-container zoom-top">
                    <div class="swiper-wrapper">
                        @foreach (App\Models\product_thumbnails::where('product_id', $singleproduct->id)->get() as $thumbnail)
                        <div class="swiper-slide zoom-image-hover">
                            <img class="img-responsive m-auto" src="{{ asset('images/product_thumbnails') }}/{{ $thumbnail->product_thumbails }}"
                                alt="">
                        </div>
                        @endforeach

                    </div>
                </div>
                <div class="swiper-container zoom-thumbs mt-3 mb-3">
                    <div class="swiper-wrapper">
                        @foreach (App\Models\product_thumbnails::where('product_id', $singleproduct->id)->get() as $thumbnail)
                        <div class="swiper-slide zoom-image-hover">
                            <img class="img-responsive m-auto" src="{{ asset('images/product_thumbnails') }}/{{ $thumbnail->product_thumbails }}"
                                alt="">
                        </div>
                        @endforeach

                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12 col-xs-12" data-aos="fade-up" data-aos-delay="200">
                @if (session('stockError'))
                    <div class="alert alert-danger">
                        {{ session('stockError') }}
                    </div>
                @endif
                <div class="product-details-content quickview-content">
                    <h2>{{ $singleproduct->product_name }}</h2>
                    <div class="pricing-meta">
                        <ul>
                            <li class="old-price not-cut">{{ $singleproduct->product_price }}</li>
                        </ul>
                    </div>
                    <div class="pro-details-rating-wrap">
                        <div class="rating-product">
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                            <i class="fa fa-star"></i>
                        </div>
                        <span class="read-review"><a class="reviews" href="#">( 5 Customer Review )</a></span>
                    </div>
                    <p class="mt-30px mb-0">{{ $singleproduct->product_sort_description }}</p>
                    <form action="{{ route('addtocart', $singleproduct->id) }}" method="POST">
                    <div class="pro-details-quality">
                            @csrf
                            <div class="cart-plus-minus">
                                <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1" />
                            </div>
                            @auth
                                <div class="pro-details-cart">
                                    <button class="add-cart" type="submit"> Add To Cart</button>
                                </div>
                            @else
                                <div class="pro-details-cart">
                                    {{-- <a > Add To Cart</a> --}}
                                    <a style="cursor: pointer" class="add-cart" data-bs-toggle="modal" data-bs-target="#loginActive">Add To Cart</a>
                                </div>
                            @endauth
                        </form>

                        @auth
                        <div class="pro-details-compare-wishlist pro-details-wishlist">
                            @if ($wishlist_status)
                                <a href="{{ route('wishlist.remove', $wishlist_id) }}"><i class="fa fa-heart text-danger"></i></a>
                            @else
                                <a href="{{ route('wishlist.insert', $singleproduct->id) }}"><i class="fa fa-heart-o"></i></a>
                            @endif
                        </div>
                        @else
                        <div class="pro-details-compare-wishlist pro-details-wishlist ">
                            <a data-bs-toggle="modal" data-bs-target="#loginActive"><i class="fa fa-heart-o"></i></a>
                        </div>
                        @endauth


                    </div>

                    <div class="pro-details-sku-info pro-details-same-style pb-2 d-flex">
                        <span>In-Stock: </span>
                        <ul class="d-flex">
                            <li>
                                @if ($singleproduct->product_quantity > 0)
                                    <a href="">{{ $singleproduct->product_quantity }}</a>
                                @else
                                <a href="">Unavailable</a>
                                @endif
                            </li>
                        </ul>
                    </div>
                    <div class="pro-details-sku-info pro-details-same-style  d-flex">
                        <span>SKU: </span>
                        <ul class="d-flex">
                            <li>
                                <a href="">{{ $singleproduct->product_code }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="pro-details-categories-info pro-details-same-style d-flex">
                        <span>Category: </span>
                        <ul class="d-flex">
                            <li>
                                <a href="{{ route('categorywayesproduct', $singleproduct->category_name) }}">{{ $singleproduct->relationtocategory->category_name }}</a>
                            </li>
                        </ul>
                    </div>
                    <div class="pro-details-social-info pro-details-same-style d-flex">
                        <span>Share: </span>
                        <ul class="d-flex">
                            <li>
                                <a href="http://www.facebook.com/sharer.php?u={{ url()->full() }}" target="_blank"><i class="fa fa-facebook"></i></a>
                            </li>
                            <li>
                                <a href="http://twitter.com/share?url={{ url()->full() }}&text=Simple Share Buttons&hashtags=simplesharebuttons" target="_blank"><i class="fa fa-twitter"></i></a>

                            </li>
                            <li>
                                <a href="https://plus.google.com/share?url={{ url()->full() }}" target="_blank"><i class="fa fa-google"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-youtube"></i></a>
                            </li>
                            <li>
                                <a href="#"><i class="fa fa-instagram"></i></a>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!-- product details description area start -->
<div class="description-review-area pb-100px" data-aos="fade-up" data-aos-delay="200">
    <div class="container">
        <div class="description-review-wrapper">
            <div class="description-review-topbar nav">
                <a data-bs-toggle="tab" href="#des-details2">Information</a>
                <a class="active" data-bs-toggle="tab" href="#des-details1">Description</a>
                <a data-bs-toggle="tab" href="#des-details3">Reviews (02)</a>
            </div>
            <div class="tab-content description-review-bottom">
                <div id="des-details2" class="tab-pane">
                    <div class="product-anotherinfo-wrapper text-start">
                        <ul>
                            <li><span>Weight</span> 400 g</li>
                            <li><span>Dimensions</span>10 x 10 x 15 cm</li>
                            <li><span>Materials</span> 60% cotton, 40% polyester</li>
                            <li><span>Other Info</span> American heirloom jean shorts pug seitan letterpress</li>
                        </ul>
                    </div>
                </div>
                <div id="des-details1" class="tab-pane active">
                    <div class="product-description-wrapper">
                        <p>{{ $singleproduct->product_long_description }}</p>
                    </div>
                </div>
                <div id="des-details3" class="tab-pane">
                    <div class="row">
                        <div class="col-lg-7">
                            <div class="review-wrapper">
                                <div class="single-review">
                                    <div class="review-img">
                                        <img src="assets/images/review-image/1.png" alt="" />
                                    </div>
                                    <div class="review-content">
                                        <div class="review-top-wrap">
                                            <div class="review-left">
                                                <div class="review-name">
                                                    <h4>White Lewis</h4>
                                                </div>
                                                <div class="rating-product">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="review-left">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>
                                        <div class="review-bottom">
                                            <p>
                                                Vestibulum ante ipsum primis aucibus orci luctustrices posuere
                                                cubilia Curae Suspendisse viverra ed viverra. Mauris ullarper
                                                euismod vehicula. Phasellus quam nisi, congue id nulla.
                                            </p>
                                        </div>
                                    </div>
                                </div>
                                <div class="single-review child-review">
                                    <div class="review-img">
                                        <img src="assets/images/review-image/2.png" alt="" />
                                    </div>
                                    <div class="review-content">
                                        <div class="review-top-wrap">
                                            <div class="review-left">
                                                <div class="review-name">
                                                    <h4>White Lewis</h4>
                                                </div>
                                                <div class="rating-product">
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                    <i class="fa fa-star"></i>
                                                </div>
                                            </div>
                                            <div class="review-left">
                                                <a href="#">Reply</a>
                                            </div>
                                        </div>
                                        <div class="review-bottom">
                                            <p>Vestibulum ante ipsum primis aucibus orci luctustrices posuere
                                                cubilia Curae Sus pen disse viverra ed viverra. Mauris ullarper
                                                euismod vehicula.</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="ratting-form-wrapper pl-50">
                                <h3>Add a Review</h3>
                                <div class="ratting-form">


                                    <form action="#">
                                        <div class="star-box">
                                            <span>Your rating:</span>
                                            <div class="rating-product">
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                                <i class="fa fa-star"></i>
                                            </div>
                                        </div>
                                        <div class="row">
                                            <div class="col-md-6">
                                                <div class="rating-form-style">
                                                    <input placeholder="Name" type="text" />
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="rating-form-style">
                                                    <input placeholder="Email" type="email" />
                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="rating-form-style form-submit">
                                                    <textarea name="Your Review" placeholder="Message"></textarea>
                                                    <button class="btn btn-primary btn-hover-color-primary "
                                                        type="submit" value="Submit">Submit</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- product details description area end -->

<!-- Related product Area Start -->
<div class="related-product-area pb-100px">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="section-title text-center mb-30px0px line-height-1">
                    <h2 class="title m-0">Related Products</h2>
                </div>
            </div>
        </div>
        <div class="new-product-slider swiper-container slider-nav-style-1 small-nav">
            <div class="new-product-wrapper swiper-wrapper">
                @forelse ($reletad_products as $reletad_product)
                    <div class="new-product-item swiper-slide">
                        <!-- Single Prodect -->
                        <div class="product">
                            <div class="thumb">
                                <a href="single-product.html" class="image">
                                    <img src="{{ asset('images/product_image/').'/'.$reletad_product->product_iamge  }}" alt="Product" />
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
                                <h5 class="title"><a href="{{ url('product/details')}}/{{ $reletad_product->slug }}">{{ $reletad_product->product_name }}</a>
                                </h5>
                                <span class="price">
                                    <span class="new">{{ $reletad_product->product_price }}</span>
                                </span>
                            </div>
                        </div>
                    </div>
                @empty
                    No Related Product
                @endforelse

            </div>
            <!-- Add Arrows -->
            <div class="swiper-buttons">
                <div class="swiper-button-next"></div>
                <div class="swiper-button-prev"></div>
            </div>
        </div>
    </div>
</div>
<!-- Related product Area End -->

@endsection
