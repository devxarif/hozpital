<?php

namespace App\Http\Controllers\Doctor;

use App\Exports\PatientExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PatientCreateRequest;
use App\Http\Requests\Admin\PatientUpdateRequest;
use App\Imports\PatientImport;
use App\Models\Patient;
use App\Services\Admin\Patient\CreatePatientService;
use App\Services\Admin\Patient\DeletePatientService;
use App\Services\Admin\Patient\UpdatePatientService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $patients = Patient::with('user:id,name,email')->latest()->paginate(config('kodebazar.rows_per_page'))->withQueryString();

        return inertia('Doctor/Patient/Index', [
            'patients' => $patients,
            'filter' => $request,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(PatientCreateRequest $request)
    {
        (new CreatePatientService)->execute($request);

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
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(PatientUpdateRequest $request, Patient $patient)
    {
        (new UpdatePatientService)->execute($request, $patient);

        $this->flashSuccess('Patient updated successfully');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Patient $patient)
    {
        (new DeletePatientService)->execute($patient);

        $this->flashSuccess('Patient deleted successfully');

        return back();
    }

    /**
     * Export data
     *
     * @return \Illuminate\Http\Response
     */
    public function export($type)
    {
        $name = time().'_patients.'.$type;

        try {
            return Excel::download(new PatientExport, $name);
        } catch (\Throwable $th) {
            $this->flashError($th->getMessage());

            return back();
        }
    }

    /**
     * Import data
     *
     * @return \Illuminate\Http\Response
     */
    public function import(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,xlsx,xls',
        ]);

        try {
            Excel::import(new PatientImport, $request->file);
            $this->flashSuccess('Patient imported successfully');
        } catch (\Throwable $th) {
            $this->flashError($th->getMessage());
        }

        return back();
    }
}
