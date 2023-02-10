<?php

namespace App\Http\Controllers\Nurse;

use App\Models\BedType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Nurse\BedType\CreateBedTypeService;
use App\Services\Nurse\BedType\UpdateBedTypeService;
use App\Http\Requests\Nurse\Bed\BedTypeCreateRequest;
use App\Http\Requests\Nurse\Bed\BedTypeUpdateRequest;

class BedTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bed_types = BedType::latest()->paginate(20)->withQueryString();

        return inertia('Nurse/BedType/Index',[
            'bed_types' => $bed_types,
            'filter' => $request
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
     * @param  BedTypeCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BedTypeCreateRequest $request)
    {
        (new CreateBedTypeService())->execute($request);

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
     * @param  BedTypeUpdateRequest $request
     * @param  BedType $bedType
     * @return \Illuminate\Http\Response
     */
    public function update(BedTypeUpdateRequest $request, BedType $bedType)
    {
        (new UpdateBedTypeService())->execute($request, $bedType);

        $this->flashSuccess('Bed type updated successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  BedType $bedType
     * @return \Illuminate\Http\Response
     */
    public function destroy(BedType $bedType)
    {
        $bedType->delete();

        $this->flashSuccess('Bed type deleted successfully');
        return back();
    }
}
