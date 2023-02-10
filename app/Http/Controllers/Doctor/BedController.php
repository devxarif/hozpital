<?php

namespace App\Http\Controllers\Doctor;

use App\Models\Bed;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\BedFloor;
use App\Models\BedType;

class BedController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Bed::query();

        if($request->has('keyword') && $request->filled('keyword')){
            $query->whereLike(['number', 'charge'],  $request->keyword);
        }

        if($request->has('status') && $request->filled('status')){
            $query->whereLike(['status'],  $request->status);
        }

        if($request->has('bed_type') && $request->filled('bed_type')){
            $query->whereHas('bedType', function($q) use ($request){
                $q->where('id', $request->bed_type);
            });
        }

        if($request->has('bed_floor') && $request->filled('bed_floor')){
            $query->whereHas('floor', function($q) use ($request){
                $q->where('id', $request->bed_floor);
            });
        }

        $data['beds'] = $query->with('bedType:id,name','floor:id,name')->latest()->paginate(20)->withQueryString();
        $data['bed_types'] = BedType::withCount('beds')->latest()->get(['id','name','slug']);
        $data['filter'] =  $request;
        $data['total_bed_count'] = Bed::count();

        return inertia('Doctor/Bed/Index',$data);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Bed $bed)
    {
        //
    }
}
