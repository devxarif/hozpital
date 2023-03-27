<?php

namespace App\Http\Controllers\Patient;

use App\Http\Controllers\Controller;
use App\Models\BloodDonor;
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

        return inertia('Patient/BloodDonor/Index', [
            'blood_donors' => $blood_donors,
            'filter' => $request,
        ]);
    }
}
