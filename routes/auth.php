<?php

use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\Auth\ForgetPasswordController;
use App\Http\Controllers\Auth\SocialLoginController;
use App\Http\Controllers\DashboardController;
use Illuminate\Support\Facades\Route;

Route::controller(AuthController::class)->group(function () {
    Route::get('/login', 'showLoginForm')->name('login');
    Route::post('/login', 'login');
    Route::post('/logout', 'logout')->name('logout');
});

Route::middleware('auth')->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
});

Route::controller(SocialLoginController::class)->group(function () {
    Route::get('/auth/{provider}/callback', 'callback')->name('social.callback');
    Route::get('/auth/{provider}/redirect', 'redirect')->name('social.login');
});

Route::controller(ForgetPasswordController::class)->group(function () {
    Route::get('/request/email', 'passwordEmail')->name('password.email');
    Route::post('/email/send/code', 'sendCode')->name('password.email.send.code');
    Route::get('/password/reset/{email}', 'passwordResetForm')->name('password.reset.form');
    Route::post('/password/reset', 'passwordReset')->name('password.reset');
});
