<?php

namespace App\Http\Controllers\Admin;

use App\Models\MedicineCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Medicine\MedicineCategoryCreateRequest;
use App\Http\Requests\Admin\Medicine\MedicineCategoryUpdateRequest;
use App\Services\Admin\MedicineCategory\CreateMedicineCategoryService;
use App\Services\Admin\MedicineCategory\UpdateMedicineCategoryService;

class MedicineCategoryController extends Controller
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
     * @param  MedicineCategoryCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(MedicineCategoryCreateRequest $request)
    {
        (new CreateMedicineCategoryService())->execute($request);

        $this->flashSuccess('Medicine Category created successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(MedicineCategory $medicineCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(MedicineCategory $medicineCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  MedicineCategoryUpdateRequest $request
     * @param  MedicineCategory $medicineCategory
     * @return \Illuminate\Http\Response
     */
    public function update(MedicineCategoryUpdateRequest $request, MedicineCategory $medicineCategory)
    {
        (new UpdateMedicineCategoryService())->execute($request, $medicineCategory);

        $this->flashSuccess('Medicine Category updated successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  MedicineCategory $medicineCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(MedicineCategory $medicineCategory)
    {
        $medicineCategory->delete();

        $this->flashSuccess('Medicine Category deleted successfully');
        return back();
    }
}
