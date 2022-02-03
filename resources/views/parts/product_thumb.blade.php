<div class="col-lg-4 col-xl-3 col-md-6 col-sm-6 col-xs-6 mb-30px all" data-aos="fade-up" data-aos-delay="200">
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
                    title="Quick view" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="pe-7s-search"></i></a>
            </div>
            <button title="Add To Cart" class=" add-to-cart">Add To Cart</button>
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
</div>
