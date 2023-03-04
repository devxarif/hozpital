<?php

namespace App\Http\Controllers\Admin;

use App\Exports\LaboratoristExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LaboratoristCreateRequest;
use App\Http\Requests\Admin\LaboratoristUpdateRequest;
use App\Imports\LaboratoristImport;
use App\Models\Laboratorist;
use App\Services\Admin\Laboratorist\CreateLaboratoristService;
use App\Services\Admin\Laboratorist\DeleteLaboratoristService;
use App\Services\Admin\Laboratorist\UpdateLaboratoristService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class LaboratoristController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Laboratorist::query();

        if($request->has('keyword') && $request->filled('keyword')) {
            $query->whereLike(['user.name', 'user.email'], $request->keyword);
        }

        $laboratorists = $query->with('user:id,name,email')->latest()->paginate(20)->withQueryString();

        return inertia('Admin/Users/Laboratorist/Index', [
            'laboratorists' => $laboratorists,
            'filter' => $request,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(LaboratoristCreateRequest $request)
    {
        (new CreateLaboratoristService)->execute($request);

        $this->flashSuccess('Laboratorist created successfully');

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
     * @return \Illuminate\Http\Response
     */
    public function update(LaboratoristUpdateRequest $request, Laboratorist $laboratorist)
    {
        (new UpdateLaboratoristService)->execute($request, $laboratorist);

        $this->flashSuccess('Laboratorist updated successfully');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Laboratorist $laboratorist)
    {
        (new DeleteLaboratoristService)->execute($laboratorist);

        $this->flashSuccess('Laboratorist deleted successfully');

        return back();
    }

    /**
     * Export data
     *
     * @return \Illuminate\Http\Response
     */
    public function export($type)
    {
        $name = time().'_laboratorists.'.$type;

        try {
            return Excel::download(new LaboratoristExport, $name);
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
            Excel::import(new LaboratoristImport, $request->file);
            $this->flashSuccess('Laboratorist imported successfully');
        } catch (\Throwable $th) {
            $this->flashError($th->getMessage());
        }

        return back();
    }
}
