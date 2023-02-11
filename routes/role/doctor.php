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
use App\Http\Controllers\Doctor\ManufactureController;
use App\Http\Controllers\Doctor\AnnouncementController;
use App\Http\Controllers\Doctor\BedAllotmentController;
use App\Http\Controllers\Doctor\LeaveRequestController;
use App\Http\Controllers\Doctor\BloodDonationController;
use App\Http\Controllers\Doctor\PrescriptionController;

Route::middleware(['auth'])->name('doctor.')->prefix('doctor')->group(function () {
    // Patient Routes
    Route::resource('patient', PatientController::class);

    // Prescription Routes
    Route::resource('prescription', PrescriptionController::class);

    // Bed
    Route::get('bedType/beds', [BedController::class, 'bedTypeWiseBeds'])->name('bedtype.bed');
    Route::get('bed', [BedController::class, 'index'])->name('bed.index');
    Route::get('bedType', [BedTypeController::class, 'index'])->name('bedType.index');
    Route::get('bedAllotment', [BedAllotmentController::class, 'index'])->name('bedAllotment.index');

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
