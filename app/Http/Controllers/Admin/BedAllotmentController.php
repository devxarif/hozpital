<?php

namespace App\Http\Controllers\Admin;

use App\Models\Bed;
use App\Models\Doctor;
use App\Models\BedType;
use App\Models\Patient;
use App\Models\BedFloor;
use App\Models\BedAllotment;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Bed\BedAllotmentCreateRequest;
use App\Http\Requests\Admin\Bed\BedAllotmentUpdateRequest;
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
        $data['beds'] = Bed::with(['bedType:id,name', 'floor:id,name','bedAllotment' => function($q){
            return $q->with('patient:id,user_id', 'patient.user:id,name')->whereStatus(1);
        }])
            ->get()
            ->groupBy(['bed_floor_id', 'bed_type_id']);
        $data['floors'] = BedFloor::all(['id', 'name']);
        $data['types'] = BedType::all(['id', 'name']);
        $data['doctors'] = Doctor::select('id','user_id')->with('user:id,name')->get();

        return inertia('Admin/Beds/BedAllotment/Index', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(BedAllotmentCreateRequest $request)
    {
        (new CreateBedAllotmentService)->execute($request);

        $this->flashSuccess('Bed allocation created successfully');
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
     * @return \Illuminate\Http\Response
     */
    public function update(BedAllotmentUpdateRequest $request, BedAllotment $bedAllotment)
    {
        (new UpdateBedAllotmentService)->execute($request, $bedAllotment);

        $this->flashSuccess('Bed allocation updated successfully');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(BedAllotment $bedAllotment)
    {
        $bedAllotment->delete();

        $this->flashSuccess('Bed allocation deleted successfully');

        return back();
    }
}
