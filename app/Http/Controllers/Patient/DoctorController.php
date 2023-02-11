<?php

namespace App\Http\Controllers\Patient;

use App\Models\Doctor;
use App\Http\Controllers\Controller;
use App\Models\Department;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Doctor::query();

        if($request->has('keyword') && $request->filled('keyword')){
            $query->whereLike(['user.name', 'user.email'],  $request->keyword);
        }
        if($request->has('department') && $request->filled('department')){
            $query->whereHas('department', function($q) use ($request){
                $q->where('id', $request->department);
            });
        }

        $doctors = $query->with('user:id,name,email','department:id,name')->latest()->paginate(20)->withQueryString();

        return inertia('Patient/Doctor/Index',[
            'doctors' => $doctors,
            'departments' => Department::select('id','name')->get(),
            'filter' => $request
        ]);
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
}
