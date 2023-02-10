<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Nurse\BedController;
use App\Http\Controllers\Doctor\EventController;
use App\Http\Controllers\Doctor\NurseController;
use App\Http\Controllers\Doctor\DoctorController;
use App\Http\Controllers\Nurse\BedTypeController;
use App\Http\Controllers\Doctor\HolidayController;
use App\Http\Controllers\Doctor\PatientController;
use App\Http\Controllers\Nurse\BedFloorController;
use App\Http\Controllers\Doctor\BloodBankController;
use App\Http\Controllers\Doctor\LeaveTypeController;
use App\Http\Controllers\Doctor\AccountantController;
use App\Http\Controllers\Doctor\BloodDonorController;
use App\Http\Controllers\Doctor\DepartmentController;
use App\Http\Controllers\Doctor\PharmacistController;
use App\Http\Controllers\Doctor\ManufactureController;
use App\Http\Controllers\Doctor\AnnouncementController;
use App\Http\Controllers\Nurse\BedAllotmentController;
use App\Http\Controllers\Doctor\LeaveRequestController;
use App\Http\Controllers\Doctor\BloodDonationController;

Route::middleware(['auth'])->name('doctor.')->prefix('doctor')->group(function () {
    // // Department Routes
    // Route::resource('department', DepartmentController::class);

    // // Doctor Routes
    // Route::resource('doctor', DoctorController::class);

    // Patient Routes
    Route::resource('patient', PatientController::class);

    // Bed
    // Route::get('bedType/beds', [BedController::class, 'bedTypeWiseBeds'])->name('bedtype.bed');
    // Route::resource('bed', BedController::class);
    // Route::resource('bedFloor', BedFloorController::class);
    // Route::resource('bedType', BedTypeController::class);
    // Route::resource('bedAllotment', BedAllotmentController::class);

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
