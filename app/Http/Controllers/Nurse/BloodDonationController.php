<?php

namespace App\Http\Controllers\Nurse;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BloodBank\BloodDonationSaveRequest;
use App\Models\BloodDonation;
use App\Services\Admin\BloodDonation\CreateBloodDonationService;
use App\Services\Admin\BloodDonation\UpdateBloodDonationService;
use Illuminate\Http\Request;

class BloodDonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $blood_donations = BloodDonation::with('bloodDonor')->latest()->paginate(config('kodebazar.rows_per_page'))->withQueryString();

        return inertia('Nurse/BloodDonation/Index', [
            'blood_donations' => $blood_donations,
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
    public function store(BloodDonationSaveRequest $request)
    {
        (new CreateBloodDonationService)->execute($request);

        $this->flashSuccess('Blood donation created successfully');

        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BloodDonation $bloodDonation)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BloodDonation $bloodDonation)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(BloodDonationSaveRequest $request, BloodDonation $bloodDonation)
    {
        (new UpdateBloodDonationService)->execute($request, $bloodDonation);

        $this->flashSuccess('Blood donation updated successfully');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(BloodDonation $bloodDonation)
    {
        $bloodDonation->delete();

        $this->flashSuccess('Blood donation deleted successfully');

        return back();
    }
}
