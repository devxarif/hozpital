<?php

namespace App\Http\Controllers\Admin;

use App\Models\BedType;
use App\Models\BedAllotment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Bed\BedCreateRequest;
use App\Http\Requests\Admin\Bed\BedUpdateRequest;
use App\Services\Admin\BedAllotment\CreateBedAllotmentService;
use App\Services\Admin\BedAllotment\UpdateBedAllotmentService;

class BedAllotmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $bed_types = BedType::latest()->paginate(20)->withQueryString();

        return inertia('Admin/BedType/Index',[
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
     * @param  BedCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BedCreateRequest $request)
    {
        (new CreateBedAllotmentService())->execute($request);

        $this->flashSuccess('Bed allotment created successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BedAllotment $bedAllotment)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BedAllotment $bedAllotment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BedUpdateRequest $request
     * @param  BedAllotment $bedAllotment
     * @return \Illuminate\Http\Response
     */
    public function update(BedUpdateRequest $request, BedAllotment $bedAllotment)
    {
        (new UpdateBedAllotmentService())->execute($request, $bedAllotment);

        $this->flashSuccess('Bed allotment updated successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  BedAllotment $bedAllotment
     * @return \Illuminate\Http\Response
     */
    public function destroy(BedAllotment $bedAllotment)
    {
        $bedAllotment->delete();

        $this->flashSuccess('Bed allotment deleted successfully');
        return back();
    }
}
