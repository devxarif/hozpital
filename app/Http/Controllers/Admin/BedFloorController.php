<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Bed\BedFloorCreateRequest;
use App\Http\Requests\Admin\Bed\BedFloorUpdateRequest;
use App\Models\BedFloor;
use App\Services\Admin\BedFloor\CreateBedFloorService;
use App\Services\Admin\BedFloor\UpdateBedFloorService;

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

        return inertia('Admin/BedFloor/Index', compact('bed_floors'));
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
     * @return \Illuminate\Http\Response
     */
    public function store(BedFloorCreateRequest $request)
    {
        (new CreateBedFloorService)->execute($request);

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
     * @return \Illuminate\Http\Response
     */
    public function update(BedFloorUpdateRequest $request, BedFloor $bedFloor)
    {
        (new UpdateBedFloorService)->execute($request, $bedFloor);

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
