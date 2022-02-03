<?php

use App\Http\Controllers\SslCommerzPaymentController;
use App\Http\Controllers\CartController;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\FrontendController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\CheckoutControllelr;
use App\Http\Controllers\CouponController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\VendorController;
use App\Http\Controllers\WishlistController;

Auth::routes();

Route::get('/', [FrontendController::class, 'index'])->name('frontend');
Route::get('product/details/{slug}', [FrontendController::class, 'productdetails'])->name('productdetails');
Route::get('category/product/{id}', [FrontendController::class, 'categorywayesproduct'])->name('categorywayesproduct');



Route::get('/home', [HomeController::class, 'index'])->name('home');
Route::get('/profile', [ProfileController::class, 'index'])->name('profile');
Route::post('/profile/update', [ProfileController::class, 'profileupdate'])->name('profileupdate');
Route::post('/profile/password/update', [ProfileController::class, 'passwordupdate'])->name('passwordupdate');
Route::post('/profile/profile/photo', [ProfileController::class, 'profilePhoto'])->name('profile.profilephoto');


Route::get('/location', [HomeController::class, 'location'])->name('location');
Route::post('/location/update', [HomeController::class, 'locationupdate'])->name('location.update');

Route::resource('category', CategoryController::class);
Route::resource('coupon', CouponController::class);
Route::resource('vendor', VendorController::class);
Route::resource('products', ProductController::class);
Route::resource('wishlist', WishlistController::class);
Route::get('/wishlist/insert/{product_id}', [WishlistController::class, 'insert'])->name('wishlist.insert');
Route::get('/wishlist/remove/{wishlist_id}', [WishlistController::class, 'remove'])->name('wishlist.remove');


Route::get('wishlist/add/to/cart/{wishlist_id}', [CartController::class, 'addtocartwishlist'])->name('addtocartwishlist');
Route::post('add/to/cart/{product_id}', [CartController::class, 'addtocart'])->name('addtocart');
Route::get('/cart', [CartController::class, 'cart'])->name('cart');
Route::get('clear/shoping/cart/{user_id}', [CartController::class, 'clearshopingcart'])->name('clearshopingcart');
Route::get('remove/cart/{cart_id}', [CartController::class, 'removecart'])->name('removecart');
Route::post('update/shoping/cart', [CartController::class, 'updateshopingcart'])->name('updateshopingcart');


Route::get('/checkout', [CheckoutControllelr::class, 'checkout'])->name('checkout');

Route::post('/checkout/post', [CheckoutControllelr::class, 'checkout_post'])->name('checkout_post');

Route::post('/get/city/list', [CheckoutControllelr::class, 'get_city_list'])->name('get_city_list');

// SSLCOMMERZ Start
Route::get('/example1', [SslCommerzPaymentController::class, 'exampleEasyCheckout']);
Route::get('/example2', [SslCommerzPaymentController::class, 'exampleHostedCheckout']);

Route::get('/pay', [SslCommerzPaymentController::class, 'index']);
Route::post('/pay-via-ajax', [SslCommerzPaymentController::class, 'payViaAjax']);

Route::post('/success', [SslCommerzPaymentController::class, 'success']);
Route::post('/fail', [SslCommerzPaymentController::class, 'fail']);
Route::post('/cancel', [SslCommerzPaymentController::class, 'cancel']);

Route::post('/ipn', [SslCommerzPaymentController::class, 'ipn']);
//SSLCOMMERZ END
