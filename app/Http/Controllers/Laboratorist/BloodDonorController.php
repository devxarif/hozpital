<?php

namespace App\Http\Controllers\Laboratorist;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BloodBank\BloodDonorCreateRequest;
use App\Http\Requests\Admin\BloodBank\BloodDonorUpdateRequest;
use App\Models\BloodDonor;
use App\Services\Admin\BloodDonor\CreateBloodDonorService;
use App\Services\Admin\BloodDonor\UpdateBloodDonorService;
use Illuminate\Http\Request;

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

        if($request->has('keyword') && $request->filled('keyword')) {
            $query->whereLike(['name', 'phone', 'email', 'age'], $request->keyword);
        }
        if($request->has('gender') && $request->filled('gender')) {
            $query->whereLike(['gender'], $request->gender);
        }
        if($request->has('blood_group') && $request->filled('blood_group')) {
            $query->whereLike(['blood_group'], $request->blood_group);
        }

        $blood_donors = $query->latest()->paginate(config('kodebazar.rows_per_page'))->withQueryString();

        return inertia('Laboratorist/BloodDonor/Index', [
            'blood_donors' => $blood_donors,
            'filter' => $request,
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
     * @return \Illuminate\Http\Response
     */
    public function store(BloodDonorCreateRequest $request)
    {
        (new CreateBloodDonorService)->execute($request);

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
     * @return \Illuminate\Http\Response
     */
    public function update(BloodDonorUpdateRequest $request, BloodDonor $bloodDonor)
    {
        (new UpdateBloodDonorService)->execute($request, $bloodDonor);

        $this->flashSuccess('Blood donor updated successfully');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(BloodDonor $bloodDonor)
    {
        $bloodDonor->delete();

        $this->flashSuccess('Blood donor deleted successfully');

        return back();
    }
}
