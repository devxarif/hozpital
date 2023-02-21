<?php

use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\HolidayController;
use App\Http\Controllers\Admin\LeaveRequestController;
use App\Http\Controllers\Admin\LeaveTypeController;
use App\Http\Controllers\Laboratorist\BloodBankController;
use App\Http\Controllers\Laboratorist\BloodDonationController;
use App\Http\Controllers\Laboratorist\BloodDonorController;
use Illuminate\Support\Facades\Route;

// Route::middleware(['auth', 'check.admin.role'])->prefix('admin')->group(function () {
Route::middleware(['auth'])->name('laboratorist.')->prefix('laboratorist')->group(function () {
    // Blood
    Route::resource('bloodBank', BloodBankController::class);
    Route::resource('bloodDonor', BloodDonorController::class);
    Route::resource('bloodDonation', BloodDonationController::class);

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
