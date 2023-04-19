<?php

namespace App\Http\Controllers\Admin;

use App\Models\Order;
use App\Models\Pharmacist;
use Illuminate\Http\Request;
use App\Exports\PharmacistExport;
use App\Imports\PharmacistImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Services\Pharmacy\FetchOrderService;
use App\Http\Requests\Admin\PharmacistCreateRequest;
use App\Http\Requests\Admin\PharmacistUpdateRequest;
use App\Services\Admin\Pharmacist\CreatePharmacistService;
use App\Services\Admin\Pharmacist\DeletePharmacistService;
use App\Services\Admin\Pharmacist\UpdatePharmacistService;

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
        $data = (new FetchOrderService)->execute($request);

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


        $data = $request->all();
        Mail::to($request->email)->send(new ContactMail($data));



        return inertia('Admin/Users/Pharmacist/Index', [
            'pharmacists' => $pharmacists,
            'filter' => $request,
        ]);
    }

    /**
     * Update order status of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function orderStatus(Request $request)
    {
        $order = Order::findOrFail($request->order_id);
        $order->update([
            'order_status' => $request->status,
        ]);

        $this->flashSuccess('Order status updated successfully');
        return back();
    }

    /**
     * Update order payment mark as paid
     *
     * @return \Illuminate\Http\Response
     */
    public function orderMarkAsPaid(Order $order)
    {
        $order->update([
            'payment_status' => 'paid',
        ]);

        $this->flashSuccess('Order payment mark as paid successfully');
        return back();
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
