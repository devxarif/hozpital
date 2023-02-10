<?php

namespace App\Http\Controllers\Doctor;

use App\Models\BedType;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

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

        return inertia('Doctor/BedType/Index',[
            'bed_types' => $bed_types,
            'filter' => $request
        ]);
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
}
