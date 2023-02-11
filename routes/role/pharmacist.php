<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Doctor\BedController;
use App\Http\Controllers\Doctor\EventController;
use App\Http\Controllers\Doctor\NurseController;
use App\Http\Controllers\Doctor\DoctorController;
use App\Http\Controllers\Doctor\BedTypeController;
use App\Http\Controllers\Doctor\HolidayController;
use App\Http\Controllers\Doctor\PatientController;
use App\Http\Controllers\Nurse\BedFloorController;
use App\Http\Controllers\Doctor\BloodBankController;
use App\Http\Controllers\Doctor\LeaveTypeController;
use App\Http\Controllers\Doctor\AccountantController;
use App\Http\Controllers\Doctor\BloodDonorController;
use App\Http\Controllers\Doctor\DepartmentController;
use App\Http\Controllers\Doctor\PharmacistController;
use App\Http\Controllers\Pharmacist\ManufactureController;
use App\Http\Controllers\Doctor\AnnouncementController;
use App\Http\Controllers\Doctor\BedAllotmentController;
use App\Http\Controllers\Doctor\LeaveRequestController;
use App\Http\Controllers\Doctor\BloodDonationController;
use App\Http\Controllers\Pharmacist\ProductController;
use App\Http\Controllers\Pharmacist\ProductCategoryController;

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
