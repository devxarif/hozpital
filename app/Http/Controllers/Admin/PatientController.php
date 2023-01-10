<?php

namespace App\Http\Controllers\Admin;

use App\Models\Patient;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PatientCreateRequest;
use App\Http\Requests\Admin\PatientUpdateRequest;
use App\Services\Admin\Patient\CreatePatientService;
use App\Services\Admin\Patient\DeletePatientService;
use App\Services\Admin\Patient\UpdatePatientService;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::with('user:id,name,email')->latest()->paginate(20);

        return inertia('Admin/Patient/Index',compact('patients'));
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
     * @param  PatientCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PatientCreateRequest $request)
    {
        (new CreatePatientService())->execute($request);

        $this->flashSuccess('Patient created successfully');
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
     * @param  PatientUpdateRequest  $request
     * @param  Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function update(PatientUpdateRequest $request, Patient $patient)
    {
        (new UpdatePatientService())->execute($request,$patient);

        $this->flashSuccess('Patient updated successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        (new DeletePatientService())->execute($patient);

        $this->flashSuccess('Patient deleted successfully');
        return back();
    }
}
