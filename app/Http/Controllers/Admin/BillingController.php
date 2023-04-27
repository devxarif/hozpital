<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Billing;
use Illuminate\Http\Request;

class BillingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Billing::query();

        if($request->has('keyword') && $request->filled('keyword')) {
            $query->whereLike(['invoice_number', 'title'], $request->keyword);
        }

        if($request->has('keyword') && $request->filled('keyword')) {
            $query->whereLike('invoice_number', $request->keyword);
        }

        if($request->has('payment_status') && $request->filled('payment_status')) {
            $query->where('status', $request->payment_status);
        }

        switch ($request->date_type) {
            case 'today':
                $query->today();
            case 'yesterday':
                $query->yesterday();
            case 'this_week':
                $query->thisWeek();
                break;
            case 'last_week':
                $query->lastWeek();
                break;
            case 'this_month':
                $query->thisMonth();
                break;
            case 'last_month':
                $query->lastMonth();
                break;
            case 'last_6_month':
                $query->last6Month();
                break;
            case 'this_year':
                $query->thisYear();
                break;
            case 'last_year':
                $query->lastYear();
                break;
            case 'custom_date':
                $request->validate([
                    'custom_date' => 'required',
                ]);

                $query->customDate($request->custom_date);
                break;
            case 'custom_range_date':
                $request->validate([
                    'custom_start_date' => 'required',
                    'custom_end_date' => 'required',
                ]);

                $query->customRangeDate($request->custom_start_date, $request->custom_end_date);
                break;
        }

        $data['filter_by_date'] = [
            ['label' => "Today". " (".now()->format('d-m-Y').")",'value' => 'today'],
            ['label' => 'Yesterday'. " (".now()->subDay()->format('d-m-Y').")",'value' => 'yesterday'],
            ['label' => 'This Week'. " (".now()->startOfWeek()->format('d-m-Y')." to ".now()->endOfWeek()->format('d-m-Y').")",'value' => 'this_week'],
            ['label' => 'Last Week'. " (".now()->subWeek()->startOfWeek()->format('d-m-Y')." to ".now()->subWeek()->endOfWeek()->format('d-m-Y').")",'value' => 'last_week'],
            ['label' => 'This Month'. " (".now()->startOfMonth()->format('d-m-Y')." to ".now()->endOfMonth()->format('d-m-Y').")",'value' => 'this_month'],
            ['label' => 'Last Month' . " (".now()->subMonth()->startOfMonth()->format('d-m-Y')." to ".now()->subMonth()->endOfMonth()->format('d-m-Y').")",'value' => 'last_month'],
            ['label' => 'Last 6 Month' . " (".now()->subMonth(6)->format('d-m-Y')." to ".now()->format('d-m-Y').")",'value' => 'last_6_month'],
            ['label' => 'This Year' . " (".now()->startOfYear()->format('d-m-Y')." to ".now()->endOfYear()->format('d-m-Y').")",'value' => 'this_year'],
            ['label' => 'Last Year' . " (".now()->subYear()->format('d-m-Y')." to ".now()->format('d-m-Y').")",'value' => 'last_year'],
            ['label' => 'Custom Date','value' => 'custom_date'],
            ['label' => 'Custom Range Date','value' => 'custom_range_date']
        ];

        $data['billings'] = $query->with('patient:id,user_id','patient.user:id,name,email')->latest()->paginate(config('kodebazar.rows_per_page'))->withQueryString();

        $data['filter'] = $request;

        return inertia('Admin/Finances/Billing/Index', $data);
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    /**
     * Update billing payment mark as paid
     *
     * @return \Illuminate\Http\Response
     */
    public function billMarkAsPaid(Billing $billing)
    {
        $billing->update([
            'status' => 'paid',
        ]);

        $this->flashSuccess('Bill payment mark as paid successfully');
        return back();
    }
}
