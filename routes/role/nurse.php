<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Nurse\BedController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\NurseController;
use App\Http\Controllers\Nurse\DoctorController;
use App\Http\Controllers\Nurse\BedTypeController;
use App\Http\Controllers\Admin\HolidayController;
use App\Http\Controllers\Nurse\PatientController;
use App\Http\Controllers\Nurse\BedFloorController;
use App\Http\Controllers\Nurse\BloodBankController;
use App\Http\Controllers\Admin\LeaveTypeController;
use App\Http\Controllers\Admin\AccountantController;
use App\Http\Controllers\Nurse\BloodDonorController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\PharmacistController;
use App\Http\Controllers\Admin\ManufactureController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Nurse\BedAllotmentController;
use App\Http\Controllers\Admin\LeaveRequestController;
use App\Http\Controllers\Nurse\BloodDonationController;

// Route::middleware(['auth', 'check.admin.role'])->prefix('admin')->group(function () {
Route::middleware(['auth'])->name('nurse.')->prefix('nurse')->group(function () {
    // // Department Routes
    // Route::resource('department', DepartmentController::class);

    // Doctor Routes
    Route::get('doctor', [DoctorController::class, 'index'])->name('doctor.index');

    // Patient Routes
    Route::resource('patient', PatientController::class);

    // Bed
    Route::get('bedType/beds', [BedController::class, 'bedTypeWiseBeds'])->name('bedtype.bed');
    Route::resource('bed', BedController::class);
    Route::resource('bedFloor', BedFloorController::class);
    Route::resource('bedType', BedTypeController::class);
    Route::resource('bedAllotment', BedAllotmentController::class);

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
