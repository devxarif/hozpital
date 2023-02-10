<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BedController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\NurseController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\GlobalController;
use App\Http\Controllers\Admin\IncomeController;
use App\Http\Controllers\Admin\BedTypeController;
use App\Http\Controllers\Admin\ExpenseController;
use App\Http\Controllers\Admin\HolidayController;
use App\Http\Controllers\Nurse\PatientController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\BedFloorController;
use App\Http\Controllers\Admin\BloodBankController;
use App\Http\Controllers\Admin\LeaveTypeController;
use App\Http\Controllers\Admin\AccountantController;
use App\Http\Controllers\Admin\BloodDonorController;
use App\Http\Controllers\Admin\DepartmentController;
use App\Http\Controllers\Admin\PharmacistController;
use App\Http\Controllers\Admin\ManufactureController;
use App\Http\Controllers\Admin\AnnouncementController;
use App\Http\Controllers\Admin\BedAllotmentController;
use App\Http\Controllers\Admin\LaboratoristController;
use App\Http\Controllers\Admin\LeaveRequestController;
use App\Http\Controllers\Admin\ReceptionistController;
use App\Http\Controllers\Admin\BloodDonationController;
use App\Http\Controllers\Admin\IncomeCategoryController;
use App\Http\Controllers\Admin\ExpenseCategoryController;
use App\Http\Controllers\Admin\ProductCategoryController;

// Route::middleware(['auth', 'check.admin.role'])->prefix('admin')->group(function () {
Route::middleware(['auth'])->name('nurse.')->prefix('nurse')->group(function () {
    // // Department Routes
    // Route::resource('department', DepartmentController::class);

    // // Doctor Routes
    // Route::resource('doctor', DoctorController::class);

    // Patient Routes
    Route::resource('patient', PatientController::class);

    // // Nurse Routes
    // Route::resource('nurse', NurseController::class);

    // // Receptionist Routes
    // Route::resource('receptionist', ReceptionistController::class);

    // // Pharmacist Routes
    // Route::resource('pharmacist', PharmacistController::class);

    // // Laboratorist Routes
    // Route::resource('laboratorist', LaboratoristController::class);

    // // Accountant Routes
    // Route::resource('accountant', AccountantController::class);

    // // product
    // Route::resource('product', ProductController::class);
    // Route::resource('productCategory', ProductCategoryController::class);
    // Route::resource('manufacture', ManufactureController::class);

    // // Bed
    // Route::get('bedType/beds', [BedController::class, 'bedTypeWiseBeds'])->name('bedtype.bed');
    // Route::resource('bed', BedController::class);
    // Route::resource('bedFloor', BedFloorController::class);
    // Route::resource('bedType', BedTypeController::class);
    // Route::resource('bedAllotment', BedAllotmentController::class);

    // // Blood
    // Route::resource('bloodBank', BloodBankController::class);
    // Route::resource('bloodDonor', BloodDonorController::class);
    // Route::resource('bloodDonation', BloodDonationController::class);

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
