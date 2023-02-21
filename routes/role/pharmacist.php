<?php

use App\Http\Controllers\Doctor\AnnouncementController;
use App\Http\Controllers\Doctor\EventController;
use App\Http\Controllers\Doctor\HolidayController;
use App\Http\Controllers\Doctor\LeaveRequestController;
use App\Http\Controllers\Doctor\LeaveTypeController;
use App\Http\Controllers\Pharmacist\ManufactureController;
use App\Http\Controllers\Pharmacist\ProductCategoryController;
use App\Http\Controllers\Pharmacist\ProductController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->name('pharmacist.')->prefix('pharmacist')->group(function () {
    // product
    Route::resource('product', ProductController::class);
    Route::resource('productCategory', ProductCategoryController::class);
    Route::resource('manufacture', ManufactureController::class);

    // // Leave
    // Route::resource('leaveType', LeaveTypeController::class);
    // Route::resource('leaveRequest', LeaveRequestController::class);
    // Route::put('leaveRequest/status-change/{leave_request}', [LeaveRequestController::class, 'statusChange'])->name('leaveRequest.status');

    // // Holiday
    // Route::resource('holiday', HolidayController::class);

    // // Event
    // Route::resource('event', EventController::class);

    // // Announcement
    // Route::resource('announcement', AnnouncementController::class);
});
