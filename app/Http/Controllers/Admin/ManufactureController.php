<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Product\ManufactureSaveRequest;
use App\Models\Manufacture;
use App\Services\Admin\Manufacture\CreateManufactureService;
use App\Services\Admin\Manufacture\UpdateManufactureService;
use Illuminate\Http\Request;

class ManufactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Manufacture::query();

        if($request->has('keyword') && $request->filled('keyword')) {
            $query->whereLike(['name', 'phone', 'email'], $request->keyword);
        }

        $manufactures = $query->latest()->paginate(config('kodebazar.rows_per_page'))->withQueryString();

        return inertia('Admin/Manufacture/Index', [
            'manufactures' => $manufactures,
            'filter' => $request,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ManufactureSaveRequest $request)
    {
        (new CreateManufactureService)->execute($request);

        $this->flashSuccess('Manufacture created successfully');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Manufacture $manufacture)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Manufacture $manufacture)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ManufactureSaveRequest $request, Manufacture $manufacture)
    {
        (new UpdateManufactureService)->execute($request, $manufacture);

        $this->flashSuccess('Manufacture updated successfully');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manufacture $manufacture)
    {
        $manufacture->delete();

        $this->flashSuccess('Manufacture deleted successfully');

        return back();
    }
}
