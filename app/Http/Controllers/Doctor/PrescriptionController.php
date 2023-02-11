<?php

namespace App\Http\Controllers\Doctor;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Doctor\PrescriptionCreateRequest;
use App\Http\Requests\Doctor\PrescriptionUpdateRequest;
use App\Models\Prescription;
use App\Services\Doctor\CreatePrescriptionService;
use App\Services\Doctor\UpdatePrescriptionService;

class PrescriptionController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $prescriptions = Prescription::currentDoctor()->with('medicines','patient:id,user_id', 'patient.user:id,name')->latest()->paginate(20);

        return inertia('Doctor/Prescription/Index',[
            'prescriptions' => $prescriptions,
            'filter' => $request
        ]);

        $query = BloodDonor::query();

        if($request->has('keyword') && $request->filled('keyword')){
            $query->whereLike(['name', 'phone','email','age'],  $request->keyword);
        }
        if($request->has('gender') && $request->filled('gender')){
            $query->whereLike(['gender'],  $request->gender);
        }
        if($request->has('blood_group') && $request->filled('blood_group')){
            $query->whereLike(['blood_group'],  $request->blood_group);
        }

        $blood_donors = $query->latest()->paginate(20)->withQueryString();

        return inertia('Doctor/BloodDonor/Index',[
            'blood_donors' => $blood_donors,
            'filter' => $request
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  PrescriptionCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(PrescriptionCreateRequest $request)
    {
        (new CreatePrescriptionService())->execute($request);

        $this->flashSuccess('Prescription created successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BloodDonor $bloodDonor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BloodDonor $bloodDonor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  PrescriptionUpdateRequest $request
     * @param  Prescription $prescription
     * @return \Illuminate\Http\Response
     */
    public function update(PrescriptionUpdateRequest $request, Prescription $prescription)
    {
        (new UpdatePrescriptionService())->execute($request, $prescription);

        $this->flashSuccess('Prescription updated successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Prescription $prescription
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prescription $prescription)
    {
        $prescription->delete();

        $this->flashSuccess('Prescription deleted successfully');
        return back();
    }
}
