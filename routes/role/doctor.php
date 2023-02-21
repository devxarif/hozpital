<?php

use App\Http\Controllers\Doctor\AnnouncementController;
use App\Http\Controllers\Doctor\AppointmentController;
use App\Http\Controllers\Doctor\AppointmentScheduleController;
use App\Http\Controllers\Doctor\BedAllotmentController;
use App\Http\Controllers\Doctor\BedController;
use App\Http\Controllers\Doctor\BedTypeController;
use App\Http\Controllers\Doctor\BloodBankController;
use App\Http\Controllers\Doctor\BloodDonationController;
use App\Http\Controllers\Doctor\BloodDonorController;
use App\Http\Controllers\Doctor\EventController;
use App\Http\Controllers\Doctor\HolidayController;
use App\Http\Controllers\Doctor\LeaveRequestController;
use App\Http\Controllers\Doctor\LeaveTypeController;
use App\Http\Controllers\Doctor\PatientController;
use App\Http\Controllers\Doctor\PrescriptionController;
use App\Http\Controllers\Nurse\BedFloorController;
use Illuminate\Support\Facades\Route;

Route::middleware(['auth'])->name('doctor.')->prefix('doctor')->group(function () {
    // Patient Routes
    Route::get('patient/export/{type}', [PatientController::class, 'export'])->name('patient.export');
    Route::post('patient/import', [PatientController::class, 'import'])->name('patient.import');
    Route::resource('patient', PatientController::class);

    // Prescription Routes
    Route::resource('prescription', PrescriptionController::class);

    // Appointment Schedule Routes
    Route::controller(AppointmentController::class)->group(function () {
        Route::get('appointment/list', 'index')->name('appointment.index');
        Route::put('appointment/status/{appointment}', 'statusUpdate')->name('appointment.status');
        // Route::put('appointmentSchedule/{appointmentSchedule}/status/update', 'statusUpdate')->name('appointmentSchedule.status');
        // Route::put('appointmentSchedule/{appointmentSchedule}/update', 'update')->name('appointmentSchedule.update');
    });

    // Appointment Schedule Routes
    Route::controller(AppointmentScheduleController::class)->group(function () {
        Route::get('appointment/schedule', 'index')->name('appointmentSchedule.index');
        Route::put('appointment/schedule/{appointmentSchedule}/status/update', 'statusUpdate')->name('appointmentSchedule.status');
        Route::put('appointment/schedule/{appointmentSchedule}/update', 'update')->name('appointmentSchedule.update');
    });

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
