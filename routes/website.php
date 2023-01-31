<?php

use App\Http\Controllers\Website\WebsiteController;
use Illuminate\Support\Facades\Route;

Route::controller(WebsiteController::class)->group(function () {
    Route::get('/', 'home')->name('website.home');
    Route::get('/departments', 'department')->name('website.department');
    Route::get('/doctors', 'doctor')->name('website.doctor');
    Route::get('/products', 'products')->name('website.products');
    Route::get('/product/details', 'productDetails')->name('website.product.details');
    Route::get('/bags', 'bags')->name('website.bag');
    Route::get('/checkout', 'checkout')->name('website.checkout');
    Route::get('/shipping', 'shipping')->name('website.shipping');
    Route::get('/payment', 'payment')->name('website.payment');
    // Route::get('/about', 'about')->name('website.about');
    // Route::get('/pricing', 'pricing')->name('website.pricing');
    // Route::get('/plan/{plan:slug}', 'planDetails')->name('website.plan.details');
    // Route::get('/contact', 'contact')->name('website.contact');
    // Route::get('/blog', 'blog')->name('website.blog');
    // Route::get('/blog/{post:slug}', 'blogDetails')->name('website.blog.details');
    // Route::get('/privacy-policy', 'privacyPolicy')->name('website.privacy.policy');
    // Route::get('/terms-conditions', 'termsCondition')->name('website.terms.condition');
});
