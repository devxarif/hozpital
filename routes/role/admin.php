<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\BedController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\EventController;
use App\Http\Controllers\Admin\NurseController;
use App\Http\Controllers\Admin\DoctorController;
use App\Http\Controllers\Admin\GlobalController;
use App\Http\Controllers\Admin\IncomeController;
use App\Http\Controllers\Admin\BedTypeController;
use App\Http\Controllers\Admin\ExpenseController;
use App\Http\Controllers\Admin\HolidayController;
use App\Http\Controllers\Admin\PatientController;
use App\Http\Controllers\Admin\ProductController;
use App\Http\Controllers\Admin\SettingController;
use App\Http\Controllers\Admin\BedFloorController;
use App\Http\Controllers\Admin\LanguageController;
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
Route::middleware(['auth'])->name('admin.')->prefix('admin')->group(function () {
    // Department Routes
    Route::resource('department', DepartmentController::class);

    // Doctor Routes
    Route::get('doctor/export/{type}', [DoctorController::class, 'export'])->name('doctor.export');
    Route::post('doctor/import', [DoctorController::class, 'import'])->name('doctor.import');
    Route::resource('doctor', DoctorController::class);

    // Patient Routes
    Route::get('patient/export/{type}', [PatientController::class, 'export'])->name('patient.export');
    Route::post('patient/import', [PatientController::class, 'import'])->name('patient.import');
    Route::resource('patient', PatientController::class);

    // Nurse Routes
    Route::get('nurse/export/{type}', [NurseController::class, 'export'])->name('nurse.export');
    Route::post('nurse/import', [NurseController::class, 'import'])->name('nurse.import');
    Route::resource('nurse', NurseController::class);

    // Receptionist Routes
    Route::get('receptionist/export/{type}', [ReceptionistController::class, 'export'])->name('receptionist.export');
    Route::post('receptionist/import', [ReceptionistController::class, 'import'])->name('receptionist.import');
    Route::resource('receptionist', ReceptionistController::class);

    // Pharmacist Routes
    Route::get('pharmacist/export/{type}', [PharmacistController::class, 'export'])->name('pharmacist.export');
    Route::post('pharmacist/import', [PharmacistController::class, 'import'])->name('pharmacist.import');
    Route::resource('pharmacist', PharmacistController::class);

    // Laboratorist Routes
    Route::get('laboratorist/export/{type}', [LaboratoristController::class, 'export'])->name('laboratorist.export');
    Route::post('laboratorist/import', [LaboratoristController::class, 'import'])->name('laboratorist.import');
    Route::resource('laboratorist', LaboratoristController::class);

    // Accountant Routes
    Route::get('accountant/export/{type}', [AccountantController::class, 'export'])->name('accountant.export');
    Route::post('accountant/import', [AccountantController::class, 'import'])->name('accountant.import');
    Route::resource('accountant', AccountantController::class);

    // product
    Route::resource('product', ProductController::class);
    Route::resource('productCategory', ProductCategoryController::class);
    Route::resource('manufacture', ManufactureController::class);

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

    // Leave
    Route::resource('leaveType', LeaveTypeController::class);
    Route::resource('leaveRequest', LeaveRequestController::class);
    Route::put('leaveRequest/status-change/{leave_request}', [LeaveRequestController::class, 'statusChange'])->name('leaveRequest.status');

    // Holiday
    Route::resource('holiday', HolidayController::class);

    // Event
    Route::resource('event', EventController::class);

    // Announcement
    Route::resource('announcement', AnnouncementController::class);

    // Income
    Route::resource('income', IncomeController::class);
    Route::resource('incomeCategory', IncomeCategoryController::class);

    // Expense
    Route::resource('expense', ExpenseController::class);
    Route::resource('expenseCategory', ExpenseCategoryController::class);

    // Route::resource('doctor', DoctorController::class)->withoutMiddleware('auth');

    // =========================================================================
    // ===================Users Routes========================================
    // ========================================================================

    // Admins
    // Route::resource('/admins', UserController::class);

    // // Companies
    // Route::resource('/companies', OrganizationController::class);
    // Route::controller(OrganizationController::class)->group(function () {
    //     Route::get('/companies/leaveTypes/{user}', 'companiesLeaveTypes')->name('companies.leaveTypes');
    //     Route::get('/companies/employees/{user}', 'companiesEmployees')->name('companies.employees');
    // });

    // =========================================================================
    // ===================Leave and Subscription Routes========================
    // ========================================================================

    // Plans
    // Route::resource('/plans', PlanController::class);
    // Route::controller(PlanController::class)->group(function () {
    //     Route::put('/plans/set-default-plan/{plan}', 'setDefault')->name('plans.set.default.plan');
    // });

    // Order
    // Route::get('/orders', [OrderController::class, 'orders'])->name('orders.index');
    // Route::get('/orders/{order}', [OrderController::class, 'orderDetails'])->name('orders.show');
    // Route::get('/orders/pdf/download/{order}', [OrderController::class, 'orderPdfDownload'])->name('orders.pdf.download')->withoutMiddleware('check.admin.role');

    // // Holidays
    // Route::resource('/holidays', HolidayController::class);
    // Route::controller(HolidayController::class)->group(function () {
    //     Route::get('/requested/holidays/{company}', 'requestedHolidays')->name('request.holidays.index');
    //     Route::post('/requested/holiday/accept', 'requestedHolidaysAccept')->name('request.holidays.accept');
    //     Route::delete('/requested/holiday/reject/{holiday}', 'requestedHolidaysReject')->name('request.holidays.reject');
    // });

    // // =========================================================================
    // // ===================Others Routes========================================
    // // ========================================================================
    // Route::resource('/posts', BlogController::class);
    // Route::resource('/faqs', FaqController::class);
    // Route::resource('/testimonials', TestimonialController::class);
    // // Route::resource('/features', FeatureController::class);
    // Route::get('/contact/messages', [GlobalController::class, 'contactMessages'])->name('contact.messages');
    // Route::delete('/contact/message/{message}', [GlobalController::class, 'contactMessageDelete'])->name('contact.messages.destroy');

    // // =========================================================================
    // // ===================Setting Routes========================================
    // // ========================================================================

    // Themes Routes
    // Route::controller(ThemeController::class)->group(function () {
    //     Route::get('/setting/theme', 'theme')->name('theme');
    //     Route::post('/setting/theme', 'adminThemeUpdate')->name('theme.admin.update');
    //     Route::post('/setting/website/theme', 'websiteThemeUpdate')->name('theme.website.update');
    // });

    // Configurations & Settings
    Route::prefix('settings')->name('settings.')->group(function(){
        Route::controller(SettingController::class)->group(function () {
            Route::get('/general', 'general')->name('general');
            Route::post('/general/setting/update', 'generalSettingUpdate')->name('general.update');

            // cms routes
            Route::get('/cms', 'cms')->name('cms');
            Route::put('/cms/update', 'cmsUpdate')->name('cms.update');

            // Payment Routes
            Route::get('/payment', 'payment')->name('payment');
            Route::get('/payment/data', 'paymentData')->name('payment.data');
            Route::put('/payment/update', 'paymentDataUpdate')->name('payment.update');

            // Seo route
            Route::get('/seo', 'seo')->name('seo');
            Route::put('/seo/update/{seo}', 'seoUpdate')->name('seo.update');

            // SMTP Routes
            Route::get('/smtp', 'smtp')->name('smtp');
            Route::put('/smtp/update', 'smtpUpdate')->name('smtp.update');
            Route::post('/send/test-email', 'testEmailSend')->name('send.test.email');

            // Upgrade application
            Route::get('/upgrade', 'upgrade')->name('upgrade');
            Route::post('/upgrade/system', 'upgradeSystem')->name('upgrade.system');

            // Currency Routes
            Route::prefix('currency')->prefix('currency')->group(function () {
                Route::get('/', 'currency')->name('currency');
                Route::post('/', 'storeCurrency')->name('currency.store');
                Route::delete('{currency}', 'deleteCurrency')->name('currency.destroy');
                Route::put('{currency}', 'updateCurrency')->name('currency.update');
                Route::put('{currency}', 'statusUpdateCurrency')->name('currency.status.update');
                Route::put('{currency}', 'defaultCurrency')->name('currency.set.default');
            });
        });

        // Roles & Permission
        Route::resource('roles', RoleController::class);

        // Languages
        Route::controller(LanguageController::class)->group(function(){
            Route::get('languages/translation/{language:language_code}', 'translationEdit')->name('language.translation');
            Route::put('languages/translation/update', 'translationUpdate')->name('language.translation.update');
            Route::post('languages/status', [LanguageController::class, 'statusUpdate'])->name('language.status');
        });
        Route::resource('languages', LanguageController::class);

        // Languages Routes
        // Route::controller(LanguageController::class)->prefix('setting')->name('languages.')->group(function () {
        //     Route::get('languages', 'index')->name('index');
        //     Route::post('languages', 'store')->name('store');
        //     Route::put('languages/{lang}', 'update')->name('update');
        //     Route::put('{lang}', 'defaultLanguage')->name('set.default');
        //     Route::delete('languages/{lang}', 'destroy')->name('destroy');
        //     Route::get('languages/translation/{lang}', 'translationEdit')->name('translation.edit');
        //     Route::put('languages/translation/{lang}', 'translationUpdate')->name('translation.update');
        //     Route::put('languages/status/{lang}', 'statusUpdate')->name('status.update');
        //     Route::get('languages/translate/single', 'singleTranslate')->name('translate');
        //     Route::get('languages/translate/all', 'allTranslate')->name('translate.all');
        // });
    });
});

Route::controller(GlobalController::class)->group(function () {
    Route::get('fetch/patients', 'fetchPatients')->name('fetch.patients');
    Route::get('fetch/beds/{type?}/{bed?}', 'fetchBeds')->name('fetch.beds');
    Route::get('fetch/departments', 'fetchDepartments')->name('fetch.departments');
    Route::get('fetch/productCategories', 'fetchProductCategories')->name('fetch.productCategories');
    Route::get('fetch/manufactures', 'fetchManufactures')->name('fetch.manufactures');
    Route::get('fetch/bedTypes', 'fetchBedTypes')->name('fetch.bedTypes');
    Route::get('fetch/bedFloors', 'fetchBedFloors')->name('fetch.bedFloors');
    Route::get('fetch/bloodDonors', 'bloodDonors')->name('fetch.bloodDonors');
    Route::get('fetch/incomeCategories', 'incomeCategories')->name('fetch.incomeCategories');
    Route::get('fetch/expenseCategories', 'expenseCategories')->name('fetch.expenseCategories');
    Route::get('fetch/leaveTypesBalance', 'fetchLeaveTypesBalance')->name('fetch.leaveTypesBalance');
    Route::get('/diff/between/days', 'diffBetweenDays')->name('difference.between.days');
    Route::get('/bed/wise/availablePatients/{bed_id}', 'bedWiseAvailablePatient')->name('bed.availablePatients');

    Route::get('/change/language/{language:language_code}', 'changeLanguage')->name('change.language');
});



// Profile & Settings
// Route::controller(UserController::class)->middleware('auth')->group(function () {
//     Route::get('/profile', 'profile')->name('user.profile');
//     Route::post('/profile/update', 'profileUpdate')->name('user.profile.update');
//     Route::post('/password/update', 'passwordUpdate')->name('user.password.update');
//     Route::delete('/account/delete', 'accountDelete')->name('user.account.delete');
// });

// Route::controller(GlobalController::class)->group(function () {
//     Route::get('/diff/between/days', 'diffBetweenDays')->name('difference.between.days');
//     Route::get('/user/notifications', 'notifications')->name('notifications.index');
//     Route::get('/get/translated/message', 'getTranslatedMessage')->name('get.translated.text');
//     Route::get('/error/403', 'error403')->name('error.403');
//     Route::get('/all/countries', 'allCountries')->name('all.countries');
//     Route::get('/all/team/sizes', 'allTeamSizes')->name('all.team.sizes');
//     Route::get('/app/setting', 'appSetting')->name('app.setting');
//     Route::get('/userid/wise/company', 'useridWiseCompany')->name('userid.wise.company');
//     Route::get('/language/{language}', 'switchLanguage')->name('language');
//     Route::get('/mark/read/notification', 'markAsReadNotification')->name('markasread.notifications');
//     Route::get('/fetch/organization/leave-types/{organization_id}', 'fetchOrganizationsLeaveTypes')->name('fetch.company.leaveTypes');
// });
