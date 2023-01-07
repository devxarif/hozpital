<?php

namespace App\Http\Controllers\Admin;

use App\Models\Manufacture;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Medicine\ManufactureSaveRequest;
use App\Services\Admin\Manufacture\CreateManufactureService;
use App\Services\Admin\Manufacture\UpdateManufactureService;

class ManufactureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param  ManufactureSaveRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(ManufactureSaveRequest $request)
    {
        (new CreateManufactureService())->execute($request);

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
     * @param  ManufactureSaveRequest $request
     * @param  Manufacture $manufacture
     * @return \Illuminate\Http\Response
     */
    public function update(ManufactureSaveRequest $request, Manufacture $manufacture)
    {
        (new UpdateManufactureService())->execute($request, $manufacture);

        $this->flashSuccess('Manufacture updated successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Manufacture $manufacture
     * @return \Illuminate\Http\Response
     */
    public function destroy(Manufacture $manufacture)
    {
        $manufacture->delete();

        $this->flashSuccess('Manufacture deleted successfully');
        return back();
    }
}
