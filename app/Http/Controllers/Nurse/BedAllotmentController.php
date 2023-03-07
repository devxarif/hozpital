<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Bed\BedCreateRequest;
use App\Http\Requests\Admin\Bed\BedUpdateRequest;
use App\Models\Bed;
use App\Models\BedAllotment;
use App\Models\BedFloor;
use App\Models\BedType;
use App\Services\Admin\BedAllotment\CreateBedAllotmentService;
use App\Services\Admin\BedAllotment\UpdateBedAllotmentService;
use Illuminate\Http\Request;

class BedAllotmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
    //     $data['bed_types'] = BedType::withCount('beds')->latest()->get(['id','name','slug']);
    //     // $beds = Bed::with('bedType:id,name','floor:id,name')->get()->groupBy(['bed_type_id', 'bed_floor_id']);

    //     $query = Bed::query();

    //     if($request->has('bed_type') && $request->filled('bed_type') && $request->bed_type != 'all'){
    //         $query->whereHas('bedType', function($q) use ($request){
    //             $q->where('slug', $request->bed_type);
    //         });
    //     }

    // //    $data['beds'] = $query->with('bedType:id,name','floor:id,name')->latest()->get()->groupBy('bed_floor_id');

    //     $data['filter'] = $request;

        $data['beds'] = Bed::with('bedType:id,name', 'floor:id,name')->get()->groupBy(['bed_floor_id', 'bed_type_id']);
        $data['floors'] = BedFloor::all(['id', 'name']);
        $data['types'] = BedType::all(['id', 'name']);

        return inertia('Nurse/BedAllotment/Index', $data);
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
    public function store(BedCreateRequest $request)
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
    public function update(BedUpdateRequest $request, BedAllotment $bedAllotment)
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
