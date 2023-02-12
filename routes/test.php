<?php

use Carbon\Carbon;
use App\Models\Bed;
use App\Models\User;
use App\Models\Order;
use App\Models\Holiday;
use App\Models\Setting;
use App\Models\Employee;
use App\Models\Language;
use App\Models\LeaveType;
use App\Models\Department;
use Illuminate\Support\Str;
use App\Models\LeaveBalance;
use App\Models\ContactMessage;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Support\Benchmark;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TestController;
use Label84\HoursHelper\Facades\HoursHelper;
use App\Http\Controllers\Admin\UpgradeController;
use sirajcse\UniqueIdGenerator\UniqueIdGenerator;

// Route::get('/', function () {

//     return inertia('Test/Chat/1');
//     return inertia('Test/Setting/1');

//     return Department::select('id','name')->get();

//     return inertia('Layout');


//     app()->setLocale('bn');
//     // return view('test.test');
//     return view('welcome');
// });
// Route::get('/', function () {

//     // return view('test.test');
//     return view('welcome');
// })->middleware('set_lang');

Route::get('/test', function () {
    $from = '08:00';
    $to = '14:00';


    $hours = HoursHelper::create($from, $to, 60);
    // $hours = HoursHelper::create($from, $to, 60, 'g:i A');

    foreach ($hours as $hour) {
       $match = Str::is('08:00', $hour);

        if ($match) {
            return $match.'-'.$hour;
        }
    }


    return 'nai';
    $time = Carbon::parse($from);
    $timeRange = [];

    do
    {
        array_push($timeRange, [
            'start' => $time->format("H:i"),
            'end' => $time->addMinutes(15)->format("H:i")
        ]);
    } while ($time->format("H:i") !== $to);

    return $timeRange;



    return auth()->user()->doctor;

    return LeaveBalance::with('leaveType:id,name')->where('user_id', auth()->id())->latest()->get();

//    return Bed::with('bedType:id,name','floor:id,name')->get()->groupBy(['bed_floor_id','bed_type_id']);

    $beds = Bed::latest()->get();

    $beds = $beds->groupBy(function($bed) {
        return $bed->bed_floor_id;
    });

    // return $beds;

    $beds = $beds->map(function($bed) {
        return $bed->groupBy(function($bed) {
            return $bed->bed_type_id;
        });
    });

    return $beds;


//    $products::latest()->get();

//     $products = products->groupBy(function($product) {
//     return $product->name;
//     });

//     $products = products->map(function($product) {
//     return $product->groupBy(function($prod) {
//         return $prod->color;
//     });
//     });

//     return $products;







    $encrypt = safeEncrypt(123);
    $decrypt = safeDecrypt($encrypt);

    return [
        'encrypt' => $encrypt,
        'decrypt' => $decrypt,
    ];

    // return youtubeId('https://www.youtube.com/watch?v=hEmi12wNGas');


    return inertia('Test/Counter');

    return inertia('Test/Login');
    return inertia('Test/Align');


    request()->validate([
        'direction' => ['in:asc,desc'],
        'field' => ['in:name,email,phone']
    ]);

    $query = ContactMessage::query();

    if (request('search')) {
        $query->where('name', 'LIKE', '%'.request('search').'%');
    }

    if (request()->has(['field', 'direction'])) {
        $query->orderBy(request('field'), request('direction'));
    }

    return inertia('Test/Datatable', [
        'contacts' => $query->paginate()->withQueryString(),
        'filters' => request()->all(['search', 'field', 'direction'])
    ]);


    $leave_types = LeaveType::with(['leaveBalances' => function($q){
        $q->where('employee_id', currentEmployee('id'));
    }])->where('organization_id', 1)
    ->get()
    ->transform(function ($data) {
        $data->remaining_days = $data->leaveBalances[0]->remaining_days;
        $data->used_days = $data->leaveBalances[0]->used_days;
        return $data;
    });

    // Benchmark::dd(fn() => $leave_types);
    return $leave_types;

    // Benchmark::dd([
    //     'Get employee id with complex way' => fn() => currentEmployee(),
    //     'Get employee id directly' => fn() => currentEmployee('id'),
    //     'Get employee by employee model' => fn() => Employee::where('user_id', auth()->id())->first(['id']),
    // ]);


    // return auth()->user()->employee->only('id');

    // return currentEmployee('id');
    $leave_types = LeaveType::with(['leaveBalances' => function($q){
        $q->where('employee_id', currentEmployee('id'));
    }])->where('organization_id', 1)->get();

    // Benchmark::dd(fn() => $leave_types);
    return $leave_types;

    return inertia('Test/Chart');
    return $user = User::first()->roles;


    return inertia('Test/Popover');

    return fake('hi_en')->name();

   return fake()->macPlatformToken();
   return fake()->chrome();
   return fake()->userAgent();
   return fake()->iban();
   return fake()->creditCardNumber();
   return fake()->emoji();
   return fake()->name();

    // $id = UniqueIdGenerator::generate(['table' => 'employees', 'field' => 'phone','length' => 10, 'prefix' =>'INV-']);

    // $id = UniqueIdGenerator::generate(['table' => 'employees', 'length' => 6, 'prefix' => 'EMPLOYEE']);
    // $id = UniqueIdGenerator::generate(['table' => 'employees', 'field' => 'phone','length' => 10,'prefix' => 'Emp-', 'suffix' => 'EMP']);
    // return $id;



    return idGenerator();
    // return Employee::latest('id')->first();



    $username = Str::slug('admin');

    $is_exists = User::whereUsername($username)->exists();

    $is_exists ? $username = $username.'-'.time():$username;

    return $username;


    $data['order'] = Order::first();
    $data['company'] = $data['order']->company->load('country:id,name', 'user');
    $data['subscribed_plan'] = $data['company']->subscription->load('plan.planFeatures');
    $data['setting'] = Setting::first();

    // return $data;
    // return view('testpdf', $data);

    $pdf = Pdf::loadView('generate.order-pdf', $data);
    // return $pdf->stream();

    return $pdf->download('invoice.pdf');




    // $collection = collect([19, 21, 29, 46]);

    // $filtered = $collection->filter(function ($value, $key) {
    //     return $value > 21;
    // });

    // dd($filtered->all());


    // return 645654;

    // $data['notifications'] = auth()->check() ? auth()->user()->notifications->take(5) : [];
    // $data['unreadNotificationsCount'] = auth()->check() ? auth()->user()->unreadNotifications->count() : 0;

    // return $data;
    // return $notifications = auth()->user()->unreadNotifications;
    $notifications = auth()->user()->notifications;

    return $notifications->where('notifiable_id', 3);
    // ->map(function($data){
    //     return $data->notifiable_id == 3;
    // });



    DB::flushQueryLog();
    // $album_list = Album::with(['first_photo'])->where('status', '=', '1');
    // $album_list = $album_list->get();
    $arr = DB::getQueryLog();
    dd($arr);




    return route('employee.leave.request.index');

    return auth()->user()->employee->company;
    return currentCompany()->subscription->plan->planFeatures->max_teams;
    if ($company) {
        $features = $company->subscription->plan->planFeatures;
    }else{
        $features = getCurrentSubscriptionFeatures();
        $company = currentCompany();
    }

    $total_teams = $company->teams->count() ?? 0;

    if ($total_teams >= $features->max_teams) {
        return true;
    }



    if (auth()->check() && auth()->user()->current_organization_id) {
       return 'ase';
    }

    return 'nai';

    return auth()->user()->companies;
    return Language::where('status', 1)->get(['id', 'name', 'code']);
    return view('system.app_status');

    return 4665;
    return view('app');
    // return view('test/test');
})->name('test');

Route::get('/test2', function () {
    return view('app');
    return view('test/test');
});


// Route::get('/testt', [TestController::class, 'index']);

Route::post('update/system', [UpgradeController::class, 'updateSystem'])->name('update.system');
