<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ReceptionistExport;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ReceptionistCreateRequest;
use App\Http\Requests\Admin\ReceptionistUpdateRequest;
use App\Imports\ReceptionistImport;
use App\Models\Receptionist;
use App\Services\Admin\Receptionist\CreateReceptionistService;
use App\Services\Admin\Receptionist\DeleteReceptionistService;
use App\Services\Admin\Receptionist\UpdateReceptionistService;
use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;

class ReceptionistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Receptionist::query();

        if($request->has('keyword') && $request->filled('keyword')) {
            $query->whereLike(['user.name', 'user.email'], $request->keyword);
        }

        $receptionists = $query->with('user:id,name,email')->latest()->paginate(20)->withQueryString();

        return inertia('Admin/Users/Receptionist/Index', [
            'receptionists' => $receptionists,
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
    public function store(ReceptionistCreateRequest $request)
    {
        (new CreateReceptionistService)->execute($request);

        $this->flashSuccess('Receptionist created successfully');

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
    public function update(ReceptionistUpdateRequest $request, Receptionist $receptionist)
    {
        (new UpdateReceptionistService)->execute($request, $receptionist);

         $this->flashSuccess('Receptionist updated successfully');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receptionist $receptionist)
    {
        (new DeleteReceptionistService)->execute($receptionist);

         $this->flashSuccess('Receptionist deleted successfully');

        return back();
    }

    /**
     * Export data
     *
     * @return \Illuminate\Http\Response
     */
    public function export($type)
    {
        $name = time().'_receptionists.'.$type;

        try {
            return Excel::download(new ReceptionistExport, $name);
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
            Excel::import(new ReceptionistImport, $request->file);
            $this->flashSuccess('Receptionist imported successfully');
        } catch (\Throwable $th) {
            $this->flashError($th->getMessage());
        }

        return back();
    }
}
