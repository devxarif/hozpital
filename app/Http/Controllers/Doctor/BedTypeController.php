<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\BedType;
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

        return inertia('Doctor/BedType/Index', [
            'bed_types' => $bed_types,
            'filter' => $request,
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
