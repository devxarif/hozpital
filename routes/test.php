<?php

use Carbon\Carbon;
use App\Models\Bed;
use App\Models\User;
use App\Models\Order;
use App\Models\Doctor;
use App\Models\Country;
use App\Models\Holiday;
use App\Models\Patient;
use App\Models\Setting;
use Livewire\Component;
use App\Models\Employee;
use App\Models\Language;
use Carbon\CarbonPeriod;
use App\Models\LeaveType;
use App\Models\Department;
use Illuminate\Support\Str;
use App\Models\BedAllotment;
use App\Models\LeaveBalance;
// use Barryvdh\DomPDF\Facade\Pdf;
use Livewire\WithPagination;
use App\Exports\PatientExport;
use App\Imports\PatientImport;
use App\Models\ContactMessage;
use App\Utils\Writer\ArrayWriter;
use Illuminate\Support\Benchmark;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Spatie\Permission\Models\Role;
use App\Models\AppointmentSchedule;
use Illuminate\Pagination\Paginator;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Config;
use App\Http\Controllers\TestController;
use Spatie\Permission\Models\Permission;
use Label84\HoursHelper\Facades\HoursHelper;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Http\Controllers\Admin\UpgradeController;
use sirajcse\UniqueIdGenerator\UniqueIdGenerator;
use Artesaos\SEOTools\Traits\SEOTools as SEOToolsTrait;
use App\Services\Admin\Setting\SocialLogin\FetchSocialProviderDataService;


// use Dompdf\Dompdf;
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

Route::get('/test2', function () {
    $languages = Language::all();
    $path = base_path('resources/json/languages.json');
    $langInfos = json_decode(file_get_contents($path), true);
    $defaultLanguage = Language::where('code', config('kodebazar.default_language'))->value('id');

    return inertia('Admin/Setting/language/Index', [
        'languages' => $languages,
        'langInfos' => $langInfos,
        'defaultLanguage' => $defaultLanguage,
    ]);



    $roles = Role::with('permissions')->paginate(10);
    $permissions = Permission::get()->groupBy('group_name');

    return inertia('Admin/Role/Index', compact('roles', 'permissions'));
    return inertia('Test/popover');
    return view('test/test');
    return view('app');

});

Route::get('/test', function () {




    $currency_decimal_places = config('kodebazar.currency_decimal_places');
    $currency_decimal_separator = config('kodebazar.currency_decimal_separator');
    $currency_thousand_separator = config('kodebazar.currency_thousand_separator');
    // $app_currency_format = config('kodebazar.currency_format');

    $amount = 123456789123456789;

    return number_format($amount, $currency_decimal_places, $currency_decimal_separator, $currency_thousand_separator);

    $format = [
        number_format($amount, $currency_decimal_places, $currency_decimal_separator, $currency_thousand_separator),
        number_format($amount),
        number_format($amount, $currency_decimal_places, $currency_decimal_separator, $currency_thousand_separator),
        number_format($amount, $currency_decimal_places, '.', $currency_thousand_separator),
        number_format($amount, $currency_decimal_places, $currency_decimal_separator, $currency_thousand_separator),
    ];
    // $format = [
    //     '12345678.00' => number_format($amount, 0, '.', ''),
    //     '12,345,678.00' => number_format($amount),
    //     '1,23,45,678.00' => number_format($amount, 2, '.', ','),
    //     '12.345.678.00' => number_format($amount, 2, '.', '.'),
    //     '12.345.678,00' => number_format($amount, 2, ',', '.'),
    // ];

    return $format;
    // return $format[$app_currency_format];




    checkSetConfig('kodebazar.time_format', 'h:i A');

    return config('kodebazar.date_format');



    return "m/d/Y (".formatTime(now(), 'm/d/Y').')';

    $provider = 'linkedin';
    return (new FetchSocialProviderDataService)->execute($provider);


    setConfig('services.demo.active', 'tssrue');
    // checkSetConfig('services.demo.active', 'asdadasd');

    return config('services.demo.active');
    // Config::write('services.demo.client_id', 'updatedclientid');
    return config('services.demo.client_id');
    return config('services.demo.client_secret');



    return $items = include lang_path('en' . "/messages.php");

    return translations(resource_path('lang/'.'en'.'.json'));

    // Set data
    // $writeConfig = new October\Rain\Config\DataWriter\Rewrite;
    // $writeConfig->toFile(resource_path('lang/en/messages.php'), [
    //     'Remember Me' => 'Remember Me Remember Me',
    //     // 'nested.config.item' => 'value',
    //     // 'arrayItem' => ['Single', 'Level', 'Array', 'Values'],
    //     // 'numberItem' => 3,
    //     // 'booleanItem' => true
    // ]);





    $language = '';
    $data = '';
    $q = '';


    // Get translation
    $items = include lang_path('en' . "/messages.php");

    // Check if has a query
    if ($q) {

        // Search in array
        $items = array_filter($items, function ($item) {
            if (stripos($item, $this->q) !== false) {
                return true;
            }
            return false;
        });
    }

   return  $data = $items;

    $page  = $this->page;
    $items = $items instanceof Collection ? $items : Collection::make($items);
    return new LengthAwarePaginator($items->forPage($page, 40), $items->count(), 40, $page, ['path' => admin_url('languages/translate/' . $this->language->id)]);


    // try {

    //     // Get language path
    //     $path             = lang_path($this->language->language_code . "/messages.php");

    //     // Set new writer
    //     $writer           = new \October\Rain\Config\DataWriter\Rewrite;

    //     // Clear value from any bad characters
    //     $clean            = str_replace(array('"', "'", ';', '\\'), ' ', $value);

    //     $remove_new_lines = trim(preg_replace('/\s+/', ' ', $clean));

    //     // Update data
    //     $writer->toFile($path, [
    //         $key => $remove_new_lines
    //     ]);

    //     // Success
    //     $this->dispatchBrowserEvent('alert',[
    //         "message" => __('messages.t_language_value_updated_successfully'),
    //     ]);


    // } catch (\Throwable $th) {
    //     throw $th;
    // }





//     /**
//  * Check when value updated
//  *
//  * @param string $value
//  * @param string $key
//  * @return void
//  */
// public function updatedData($value, $key)
// {
//     try {

//         // Get language path
//         $path             = lang_path($this->language->language_code . "/messages.php");

//         // Set new writer
//         $writer           = new \October\Rain\Config\DataWriter\Rewrite;

//         // Clear value from any bad characters
//         $clean            = str_replace(array('"', "'", ';', '\\'), ' ', $value);

//         $remove_new_lines = trim(preg_replace('/\s+/', ' ', $clean));

//         // Update data
//         $writer->toFile($path, [
//             $key => $remove_new_lines
//         ]);

//         // Success
//         $this->dispatchBrowserEvent('alert',[
//             "message" => __('messages.t_language_value_updated_successfully'),
//         ]);


//     } catch (\Throwable $th) {
//         throw $th;
//     }
// }





















    return 4654;
    return $bdCountry = Country::where('code', 'bd')->first();
    $type = 'available';

    $withoutBed = 24;

    $query = Bed::query();

    if ($type == 'available') {
        $query->where('status', 'available');
    }elseif ($type == 'alloted') {
        $query->where('status', 'alloted');
    }

    $beds = $query->select('id','bed_type_id','bed_floor_id','charge','number')
            ->with('bedType:id,name', 'floor:id,name')
            ->oldest('bed_floor_id')
            ->get();

    if ($withoutBed) {
        $withoutBed = Bed::with('bedType:id,name', 'floor:id,name')->where('id',  $withoutBed)->get();
        $beds = $beds->merge($withoutBed);
    }


    return $beds;






    // return Bed::with('bedAllotment')->get();
    return $data['beds'] = Bed::with(['bedType:id,name', 'floor:id,name','bedAllotment' => function($q){
        return $q->with('patient:id,user_id', 'patient.user:id,name')->whereStatus(1);
    }])
        ->get()
        ->groupBy(['bed_floor_id', 'bed_type_id']);


    return DB::getSchemaBuilder()->getColumnListing('users');


    $alloted = BedAllotment::where(['bed_id' => 12, 'status' => 0])->first();
    $patients = Patient::query();

    if ($alloted) {
        $patients->select('id','user_id')
                ->with('user:id,name')
                ->where('id', '!=', $alloted->patient_id);
    }

    return $patients->get();





    return $available_beds = Bed::where('status', 'available')->with('bedType:id,name', 'floor:id,name')->latest()->get();


    $bed_allotment = BedAllotment::where('bed_id', 2)->update(['status' => 0]);
    return BedAllotment::where('bed_id', 2)->get();

    return Doctor::select('id','user_id')->with('user:id,name')->get();
    return Patient::select('id','user_id')->with('user:id,name')->get();


     $sorted = $available_beds->sortBy([
        ['bed_floor_id','asc'],
        ['bed_type_id','asc'],
    ]);
    //  $sorted = $available_beds->sortBy(['bed_floor_id', 'bed_type_id']);
     return gettype($sorted->toArray());




    $beds = Bed::where('status', 'available')->get();
    return $beds;
    return Bed::with(['bedType:id,name', 'floor:id,name','bedAllotment' => function($q){
        return $q->with('patient:id,user_id', 'patient.user:id,name')->whereStatus(1)->first();
    }])
            ->get()
            ->groupBy(['bed_floor_id', 'bed_type_id']);

    return Bed::with('bedAllotment')->get();

    $id = 1;


    \Cart::update($id, array(
        'quantity' => array(
            'relative' => true,
            'value' => 5
        )
    ));

        return [
            'quantity' => \Cart::getTotalQuantity(),
            'total' => \Cart::getTotal(),
            'sub_total' => \Cart::getSubTotal(),
            'items' => \Cart::getContent(),
        ];




   return $cart_items = \Cart::getContent();
    return \Cart::getTotalQuantity();
    $total = \Cart::getTotal();
    $subtotal = \Cart::getSubTotal();

    return [
        $cart_items,
        $total,
        $subtotal
    ];
    // $user = User::create([
    //     'name' => $row[0] ?? fake()->name,
    //     'email' => $row[1] ?? fake()->safeEmail,
    //     'password' => bcrypt($row[2] ?? 'password'),
    //     // 'role' => 'patient',
    // ]);

    // return $user;

    return Excel::import(new PatientImport, public_path('uploads/import/mBUY7cVNW0SIKUpkRP7WLzfqb8Wj8cMPcL1kvyCy.csv'));

    return Excel::import(new PatientImport, public_path('uploads/import/s6g78UQGjE7EJGPcGjL7BlVVdT8opqa6GY9x2PIR.xlsx'));

    $type = 'csv';
    $name = time().'_patients.'.$type;

    return Excel::download(new PatientExport, $name);

    return Excel::download(new PatientExport, 'users.xls');

    return Excel::download(new PatientExport, 'users.pdf', \Maatwebsite\Excel\Excel::MPDF);
    // return Excel::download(new PatientExport, 'users.pdf', \Maatwebsite\Excel\Excel::DOMPDF);
    return Excel::download(new PatientExport, 'users.html');

    return Excel::download(new PatientExport, 'users.csv');

    return Excel::download(new PatientExport, 'users.xlsx');

    return Excel::download(new PatientExport, 'users.pdf');

    return inertia('Auth/LoginPage2');

    $time = [
        ['start' => '08:00', 'end' => '08:30'],
        ['start' => '08:30', 'end' => '09:00'],
        ['start' => '10:00', 'end' => '10:30'],
        ['start' => '10:30', 'end' => '11:00'],
        ['start' => '11:30', 'end' => '12:00'],
        ['start' => '14:00', 'end' => '14:30'],
        ['start' => '14:30', 'end' => '15:00'],
        ['start' => '15:00', 'end' => '15:30'],
        ['start' => '15:30', 'end' => '16:00'],
    ];

    return $time[8];

    return $hours_24 = HoursHelper::create('10:00', '12:00', 30);

    $startDate = '2023-02-01';
    $endDate = '2023-04-20';

    return Carbon::parse($endDate)->isFuture();

    return $startDate->isPast();

    return now()->format('Y-m-d');

    $dateRange = iterator_to_array(CarbonPeriod::create($startDate, $endDate)->map(fn ($date) => $date->toDateString()));
    $index = rand(0, 70);

    return $dateRange[$index];
    // $dateRange = CarbonPeriod::since($startDate)->days(1)->until($endDate)->map(fn ($date) => $date->toDateString());
    // $dateRange = CarbonPeriod::create($startDate, $endDate);

    // return $dateRange;
    // return $dateRange->random();
    $data = json_decode(json_encode($dateRange), true);

    return $data->random();

    // return $dateRange;

    return $days;

    $start = '8:00';
    $end = '12:59';

    return explode(':', $start)[0];

    return $start = Carbon::parse($start)->format('H:i');

    $hours_24 = HoursHelper::create($start, $end, 20);
    $hours_12 = HoursHelper::create($start, $end, 20, 'g:i A');

    return [
        'hours_24' => $hours_24,
        'hours_12' => $hours_12,
    ];

    $schedule = AppointmentSchedule::currentDoctor()->with('appointmentSlots')->first();
    // return $schedule = currentDoctor()->appointmentSlots;

    // return $schedule->appointmentSlots;

    $collections = [];
    foreach ($schedule->appointmentSlots as $slot) {
        $values = HoursHelper::create($slot->start, $slot->end, $slot->diff_time);
        $collections[] = $values;
    }

    $result = [];
    foreach ($collections as $array) {
        $result = array_merge($result, json_decode(json_encode($array), true));
    }

    $unique_values = array_values(array_unique($result));

    return $unique_values;

    // foreach ($collections as $idx => $val ) {
    //     $all_array[] = $val;
    //     // $all_array[] = [$val, $array2[$idx], $array3[$idx] ];
    // }

    // return $all_array;

    $all_array = [];

    for($z = 0; $z < count($collections); $z++) {
        // return $collection
        // $all_array[$z][] = array_merge($array1[$z],$array2[$z] );

        $all_array[] = array_combine_array($collections[$z]);

        $all_array = array_merge(json_decode(json_encode($collections[$z]), true));
    }

    return $all_array;

    foreach ($collections as $key => $collection) {
        return $collection;
    }

    // for ($i=0; $i < ; $i++) {
    //     # code...
    // }

    return count($collection);

    $from = '08:00';
    $to = '12:00';
    $from2 = '10:00';
    $to2 = '15:00';

    // $days_periods = CarbonPeriod::create($from, $to)->map(fn ($date) => $date->toDateString());
    // return iterator_to_array($days_periods);

    // $holidays = [];
    // $holidays_between_days = Holiday::where('company_id', $company_id)
    //     ->whereDate('start', '>=', $start_date)
    //     ->whereDate('end', '<=', $end_date)
    //     ->get(['start', 'end']);

    // foreach ($holidays_between_days as $holiday) {
    //     $holidays = array_merge($holidays, iterator_to_array(CarbonPeriod::create($holiday->start, $holiday->end)->map(fn ($date) => $date->toDateString())));
    // }

    // $holidays = array_values(array_unique($holidays));

    $hours_1 = HoursHelper::create($from, $to, 20);
    $hours_2 = HoursHelper::create($from2, $to2, 20);

    return [
        json_decode(json_encode($hours_1), true),
        json_decode(json_encode($hours_2), true),
    ];

    $array = array_merge(json_decode(json_encode($hours_1), true), json_decode(json_encode($hours_2), true));

    $unique_array = array_values(array_unique($array));

    // $hours = HoursHelper::create('08:00', '11:00', 60, 'H:i', [
    //     ['09:00', '09:59'],
    //     // more..
    // ]);

    return $unique_array;
    // return [
    //     $array,
    //     $hours_24
    // ];

    $hours_24 = HoursHelper::create($from, $to, 20);
    $doctor = currentDoctor();
    $slot = $doctor->appointmentSlots;

    // return $slot;
    $hours_24 = HoursHelper::create($slot->start, $slot->end, 20);
    $hours_12 = HoursHelper::create($slot->start, $slot->end, 20, 'g:i A');

    return [
        'slot' => $slot,
        'hours_24' => $hours_24,
        'hours_12' => $hours_12,
    ];

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

    do {
        array_push($timeRange, [
            'start' => $time->format('H:i'),
            'end' => $time->addMinutes(15)->format('H:i'),
        ]);
    } while ($time->format('H:i') !== $to);

    return $timeRange;

    return auth()->user()->doctor;

    return LeaveBalance::with('leaveType:id,name')->where('user_id', auth()->id())->latest()->get();

//    return Bed::with('bedType:id,name','floor:id,name')->get()->groupBy(['bed_floor_id','bed_type_id']);

    $beds = Bed::latest()->get();

    $beds = $beds->groupBy(function ($bed) {
        return $bed->bed_floor_id;
    });

    // return $beds;

    $beds = $beds->map(function ($bed) {
        return $bed->groupBy(function ($bed) {
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
        'field' => ['in:name,email,phone'],
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
        'filters' => request()->all(['search', 'field', 'direction']),
    ]);

    $leave_types = LeaveType::with(['leaveBalances' => function ($q) {
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
    $leave_types = LeaveType::with(['leaveBalances' => function ($q) {
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

    $is_exists ? $username = $username.'-'.time() : $username;

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
    }else {
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

    return Language::where('status', 1)->get(['id', 'name', 'country_code']);

    return view('system.app_status');

    return 4665;

    return view('app');
    // return view('test/test');
})->name('test');



// Route::get('/testt', [TestController::class, 'index']);

Route::post('update/system', [UpgradeController::class, 'updateSystem'])->name('update.system');
