<?php

namespace App\Http\Controllers\Admin;

use App\Exports\PharmacistExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PharmacistCreateRequest;
use App\Http\Requests\Admin\PharmacistUpdateRequest;
use App\Imports\PharmacistImport;
use App\Models\Order;
use App\Models\Pharmacist;
use App\Services\Admin\Pharmacist\CreatePharmacistService;
use App\Services\Admin\Pharmacist\DeletePharmacistService;
use App\Services\Admin\Pharmacist\UpdatePharmacistService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PharmacistController extends Controller
{
    /**
     * Display a dashboard of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function dashboard(Request $request)
    {
        return inertia('Pharmacist/Dashboard');
    }

    /**
     * Display a order of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function order(Request $request)
    {
        $query = Order::query();

        if($request->has('type') && $request->filled('type') && $request->type != 'all') {
            $query->whereOrderStatus($request->type);
        }

        $data['orders'] = $query->with('user')->latest()->paginate(config('kodebazar.rows_per_page'))->withQueryString();
        $data['filter'] = $request;

        $orders = Order::all();
        $data['pending_orders_count'] = $orders->where('order_status', 'pending')->count();
        $data['confirmed_orders_count'] = $orders->where('order_status', 'confirmed')->count();
        $data['on_the_way_orders_count'] = $orders->where('order_status', 'on_the_way')->count();
        $data['delivered_orders_count'] = $orders->where('order_status', 'delivered')->count();
        $data['cancelled_orders_count'] = $orders->where('order_status', 'cancelled')->count();
        $data['refunded_orders_count'] = $orders->where('order_status', 'refunded')->count();
        $data['total_orders_count'] = $orders->count();
        $data['filter_by_date'] = [
            ['label' => "Today". " (".now()->format('d-m-Y').")",'value' => 'today'],
            ['label' => 'Yesterday'. " (".now()->subDay()->format('d-m-Y').")",'value' => 'yesterday'],
            ['label' => 'This Week'. " (".now()->startOfWeek()->format('d-m-Y')." to ".now()->endOfWeek()->format('d-m-Y').")",'value' => 'this_week'],
            ['label' => 'Last Week'. " (".now()->subWeek()->startOfWeek()->format('d-m-Y')." to ".now()->subWeek()->endOfWeek()->format('d-m-Y').")",'value' => 'last_week'],
            ['label' => 'This Month'. " (".now()->startOfMonth()->format('d-m-Y')." to ".now()->endOfMonth()->format('d-m-Y').")",'value' => 'this_month'],
            ['label' => 'Last Month' . " (".now()->subMonth()->startOfMonth()->format('d-m-Y')." to ".now()->subMonth()->endOfMonth()->format('d-m-Y').")",'value' => 'last_month'],
            ['label' => 'Last 6 Month' . " (".now()->subMonth(6)->format('d-m-Y')." to ".now()->format('d-m-Y').")",'value' => 'last_6_month'],
            ['label' => 'This Year' . " (".now()->startOfYear()->format('d-m-Y')." to ".now()->endOfYear()->format('d-m-Y').")",'value' => 'this_year'],
            ['label' => 'Last Year' . " (".now()->subYear()->format('d-m-Y')." to ".now()->format('d-m-Y').")",'value' => 'last_year']
        ];

        return inertia('Pharmacist/Order', $data);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Pharmacist::query();

        if($request->has('keyword') && $request->filled('keyword')) {
            $query->whereLike(['user.name', 'user.email'], $request->keyword);
        }

        $pharmacists = $query->with('user:id,name,email')->latest()->paginate(config('kodebazar.rows_per_page'))->withQueryString();

        return inertia('Admin/Users/Pharmacist/Index', [
            'pharmacists' => $pharmacists,
            'filter' => $request,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PharmacistCreateRequest $request)
    {
        (new CreatePharmacistService)->execute($request);

        $this->flashSuccess('Pharmacist created successfully');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Pharmacist  $request
     * @return \Illuminate\Http\Response
     */
    public function update(PharmacistUpdateRequest $request, Pharmacist $pharmacist)
    {
        (new UpdatePharmacistService)->execute($request, $pharmacist);

        $this->flashSuccess('Pharmacist updated successfully');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pharmacist $pharmacist)
    {
        (new DeletePharmacistService)->execute($pharmacist);

        $this->flashSuccess('Pharmacist deleted successfully');

        return back();
    }

    /**
     * Export data
     *
     * @return \Illuminate\Http\Response
     */
    public function export($type)
    {
        $name = time().'_pharmacists.'.$type;

        try {
            return Excel::download(new PharmacistExport, $name);
        } catch (\Throwable $th) {
            $this->flashError($th->getMessage());

            return back();
        }
    }

    /**
     * Import data
     *
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xlsx,xls',
        ]);

        try {
            Excel::import(new PharmacistImport, $request->file);
            $this->flashSuccess('Pharmacist imported successfully');
        } catch (\Throwable $th) {
            $this->flashError($th->getMessage());
        }

        return back();
    }
}
