<?php

use App\Http\Controllers\Website\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::controller(WebsiteController::class)->group(function () {
    Route::get('/', 'home')->name('website.home');
    Route::get('/about', 'about')->name('website.about');
    Route::get('/contact', 'contact')->name('website.contact');
    Route::get('/terms-conditions', 'termsCondition')->name('website.terms');
    Route::get('/privacy-policy', 'privacyPolicy')->name('website.policy');
    Route::get('/departments', 'department')->name('website.department');
    Route::get('/doctors', 'doctor')->name('website.doctor');
    Route::get('/products', 'products')->name('website.products');
    Route::get('/product/{product:slug}', 'productDetails')->name('website.product.details');
    Route::get('/bags', 'bags')->name('website.bag');
    Route::get('/checkout', 'checkout')->name('website.checkout');
    Route::get('/shipping', 'shipping')->name('website.shipping');
    Route::get('/payment', 'payment')->name('website.payment');
    Route::get('/appointment', 'appointment')->name('website.appointment');
    // Route::get('/pricing', 'pricing')->name('website.pricing');
    // Route::get('/plan/{plan:slug}', 'planDetails')->name('website.plan.details');
    // Route::get('/contact', 'contact')->name('website.contact');
    // Route::get('/blog', 'blog')->name('website.blog');
    // Route::get('/blog/{post:slug}', 'blogDetails')->name('website.blog.details');
});

Route::controller(CartController::class)->group(function () {
    Route::post('/add/cart', 'addToCart')->name('cart.add');
    // Route::post('/update/cart/quantity', 'updateCart')->name('cart.update.quantity');
    // Route::post('/update/single-cart/quantity', 'updateSingleCart')->name('single.cart.quantity.update');
    // Route::get('/remove/cart/{cart_id}', 'removeFromCart')->name('cart.remove');
    // Route::post('/remove/cart/ajax', 'removeFromCartAjax')->name('cart.remove.ajax');
    // Route::get('/count/cart', 'countCart')->name('cart.count');
    // Route::get('/fetch/cart', 'fetchCartItems')->name('cart.item');
    // Route::get('/fetch/cart/subtotal', 'fetchCartSubtotal')->name('cart.subtotal');
    // Route::get('/buy/now/{product}', 'buyNow')->name('buy.now');
    // Route::get('/cart', 'cart')->name('cart');
    // Route::post('/coupon/apply', 'couponApply')->name('coupon.apply');
    // Route::post('/coupon/clear', 'couponClear')->name('coupon.clear');
});
