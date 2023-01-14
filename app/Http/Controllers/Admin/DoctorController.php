<?php

namespace App\Http\Controllers\Admin;

use App\Models\Doctor;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\DoctorCreateRequest;
use App\Http\Requests\Admin\DoctorUpdateRequest;
use App\Models\Department;
use App\Services\Admin\Doctor\CreateDoctorService;
use App\Services\Admin\Doctor\DeleteDoctorService;
use App\Services\Admin\Doctor\UpdateDoctorService;
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

        return inertia('Admin/Doctor/Index',[
            'doctors' => $doctors,
            'departments' => Department::select('id','name')->get(),
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
     * @param  DoctorCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(DoctorCreateRequest $request)
    {
        (new CreateDoctorService())->execute($request);

        $this->flashSuccess('Doctor created successfully');
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
     * @param  DoctorUpdateRequest  $request
     * @param  Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(DoctorUpdateRequest $request, Doctor $doctor)
    {
        (new UpdateDoctorService())->execute($request,$doctor);

        $this->flashSuccess('Doctor updated successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Doctor $doctor)
    {
        (new DeleteDoctorService())->execute($doctor);

        $this->flashSuccess('Doctor deleted successfully');
        return back();
    }
}
