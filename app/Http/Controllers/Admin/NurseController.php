<?php

namespace App\Http\Controllers\Admin;

use App\Exports\NurseExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NurseCreateRequest;
use App\Http\Requests\Admin\NurseUpdateRequest;
use App\Imports\NurseImport;
use App\Models\Nurse;
use App\Services\Admin\Nurse\CreateNurseService;
use App\Services\Admin\Nurse\DeleteNurseService;
use App\Services\Admin\Nurse\UpdateNurseService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class NurseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Nurse::query();

        if($request->has('keyword') && $request->filled('keyword')) {
            $query->whereLike(['user.name', 'user.email'], $request->keyword);
        }

        $nurses = $query->with('user:id,name,email')->latest()->paginate(20)->withQueryString();

        return inertia('Admin/Nurse/Index', [
            'nurses' => $nurses,
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
    public function store(NurseCreateRequest $request)
    {
        (new CreateNurseService)->execute($request);

        $this->flashSuccess('Nurse created successfully');

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
     * @param  Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(NurseUpdateRequest $request, Nurse $nurse)
    {
        (new UpdateNurseService)->execute($request, $nurse);

        $this->flashSuccess('Nurse updated successfully');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Nurse  $doctor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Nurse $nurse)
    {
        (new DeleteNurseService)->execute($nurse);

        $this->flashSuccess('Nurse deleted successfully');

        return back();
    }

    /**
     * Export data
     *
     * @return \Illuminate\Http\Response
     */
    public function export($type)
    {
        $name = time().'_nurses.'.$type;

        try {
            return Excel::download(new NurseExport, $name);
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
            Excel::import(new NurseImport, $request->file);
            $this->flashSuccess('Nurse imported successfully');
        } catch (\Throwable $th) {
            $this->flashError($th->getMessage());
        }

        return back();
    }
}
