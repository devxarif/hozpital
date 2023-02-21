<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Bed;
use App\Models\BedAllotment;
use App\Models\BedFloor;
use App\Models\BedType;
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

        return inertia('Doctor/BedAllotment/Index', $data);
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
}
