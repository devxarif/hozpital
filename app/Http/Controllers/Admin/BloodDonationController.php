<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\BloodDonation;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\BloodBank\BloodDonationSaveRequest;
use App\Services\Admin\BloodDonation\CreateBloodDonationService;
use App\Services\Admin\BloodDonation\UpdateBloodDonationService;

class BloodDonationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blood_donations = BloodDonation::with('bloodDonor')->latest()->paginate(20);

        return inertia('Admin/BloodDonation/Index',compact('blood_donations'));
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
     * @param  BloodDonationSaveRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BloodDonationSaveRequest $request)
    {
        (new CreateBloodDonationService())->execute($request);

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
     * @param  BloodDonationSaveRequest $request
     * @param  BloodDonation $bloodDonation
     * @return \Illuminate\Http\Response
     */
    public function update(BloodDonationSaveRequest $request, BloodDonation $bloodDonation)
    {
        (new UpdateBloodDonationService())->execute($request, $bloodDonation);

        $this->flashSuccess('Blood donation updated successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  BloodDonation $bloodDonation
     * @return \Illuminate\Http\Response
     */
    public function destroy(BloodDonation $bloodDonation)
    {
        $bloodDonation->delete();

        $this->flashSuccess('Blood donation deleted successfully');
        return back();
    }
}
