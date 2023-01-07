<?php

namespace App\Http\Controllers\Admin;

use App\Models\Medicine;
use App\Http\Controllers\Controller;
use App\Services\Admin\Medicine\CreateMedicineService;
use App\Services\Admin\Medicine\UpdateMedicineService;
use App\Http\Requests\Admin\Medicine\MedicineCreateRequest;
use App\Http\Requests\Admin\Medicine\MedicineUpdateRequest;

class MedicineController extends Controller
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
     * @param  MedicineCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedicineCreateRequest $request)
    {
        (new CreateMedicineService())->execute($request);

        $this->flashSuccess('Medicine created successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Medicine $medicine)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Medicine $medicine)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MedicineUpdateRequest $request
     * @param  Medicine $medicine
     * @return \Illuminate\Http\Response
     */
    public function update(MedicineUpdateRequest $request, Medicine $medicine)
    {
        (new UpdateMedicineService())->execute($request, $medicine);

        $this->flashSuccess('Medicine updated successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Medicine $medicine
     * @return \Illuminate\Http\Response
     */
    public function destroy(Medicine $medicine)
    {
        $medicine->delete();

        $this->flashSuccess('Medicine deleted successfully');
        return back();
    }
}
