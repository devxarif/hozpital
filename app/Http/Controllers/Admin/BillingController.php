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

        $billings = $query->with('patient:id,user_id','patient.user:id,name')->latest()->paginate(config('kodebazar.rows_per_page'))->withQueryString();

        return inertia('Admin/Finances/Billing/Index', [
            'billings' => $billings,
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
