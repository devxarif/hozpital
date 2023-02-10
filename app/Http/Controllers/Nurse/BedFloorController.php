<?php

namespace App\Http\Controllers\Nurse;

use App\Models\BedFloor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Nurse\Bed\BedFloorCreateRequest;
use App\Http\Requests\Nurse\Bed\BedFloorUpdateRequest;
use App\Services\Nurse\BedFloor\CreateBedFloorService;
use App\Services\Nurse\BedFloor\UpdateBedFloorService;

class BedFloorController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bed_floors = BedFloor::all();

        return inertia('Nurse/BedFloor/Index',compact('bed_floors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  BedFloorCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BedFloorCreateRequest $request)
    {
        (new CreateBedFloorService())->execute($request);

        $this->flashSuccess('Bed floor created successfully');
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
     * @param BedFloorUpdateRequest  $request
     * @param BedFloor  $bedFloor
     * @return \Illuminate\Http\Response
     */
    public function update(BedFloorUpdateRequest $request, BedFloor $bedFloor)
    {
        (new UpdateBedFloorService())->execute($request,$bedFloor);

        $this->flashSuccess('Bed floor updated successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(BedFloor $bedFloor)
    {
        $bedFloor->delete();

        $this->flashSuccess('Bed floor deleted successfully');
        return back();
    }
}
