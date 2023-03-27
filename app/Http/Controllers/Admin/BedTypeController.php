<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Bed\BedTypeCreateRequest;
use App\Http\Requests\Admin\Bed\BedTypeUpdateRequest;
use App\Models\BedType;
use App\Services\Admin\BedType\CreateBedTypeService;
use App\Services\Admin\BedType\UpdateBedTypeService;
use Illuminate\Http\Request;

class BedTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bed_types = BedType::latest()->paginate(config('kodebazar.rows_per_page'))->withQueryString();

        return inertia('Admin/Beds/BedType/Index', [
            'bed_types' => $bed_types,
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
    public function store(BedTypeCreateRequest $request)
    {
        (new CreateBedTypeService)->execute($request);

        $this->flashSuccess('Bed type created successfully');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BedType $bedType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BedType $bedType)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(BedTypeUpdateRequest $request, BedType $bedType)
    {
        (new UpdateBedTypeService)->execute($request, $bedType);

        $this->flashSuccess('Bed type updated successfully');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(BedType $bedType)
    {
        $bedType->delete();

        $this->flashSuccess('Bed type deleted successfully');

        return back();
    }
}
