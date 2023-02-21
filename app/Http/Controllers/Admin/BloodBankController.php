<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BloodBank;
use Illuminate\Http\Request;

class BloodBankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $blood_banks = BloodBank::latest()->get();

        return inertia('Admin/BloodBank/Index', compact('blood_banks'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, BloodBank $bloodBank)
    {
        $request->validate(['bags' => 'required']);

        $bloodBank->update([
            'bags' => $request->bags,
        ]);

        $this->flashSuccess('Blood bank updated successfully');

        return back();
    }
}
