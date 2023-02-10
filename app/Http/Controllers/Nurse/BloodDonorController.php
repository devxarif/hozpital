<?php

namespace App\Http\Controllers\Nurse;

use App\Models\BloodDonor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Nurse\BloodDonor\CreateBloodDonorService;
use App\Services\Nurse\BloodDonor\UpdateBloodDonorService;
use App\Http\Requests\Nurse\BloodBank\BloodDonorCreateRequest;
use App\Http\Requests\Nurse\BloodBank\BloodDonorUpdateRequest;

class BloodDonorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
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

        return inertia('Nurse/BloodDonor/Index',[
            'blood_donors' => $blood_donors,
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
     * @param  BloodDonorCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BloodDonorCreateRequest $request)
    {
        (new CreateBloodDonorService())->execute($request);

        $this->flashSuccess('Blood donor created successfully');
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
     * @param  BloodDonorUpdateRequest $request
     * @param  BloodDonor $bloodDonor
     * @return \Illuminate\Http\Response
     */
    public function update(BloodDonorUpdateRequest $request, BloodDonor $bloodDonor)
    {
        (new UpdateBloodDonorService())->execute($request, $bloodDonor);

        $this->flashSuccess('Blood donor updated successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  BloodDonor $bloodDonor
     * @return \Illuminate\Http\Response
     */
    public function destroy(BloodDonor $bloodDonor)
    {
        $bloodDonor->delete();

        $this->flashSuccess('Blood donor deleted successfully');
        return back();
    }
}
