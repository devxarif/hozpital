<?php

namespace App\Http\Controllers\Admin;

use App\Exports\ReceptionistExport;
use App\Models\Receptionist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use App\Http\Requests\Admin\ReceptionistCreateRequest;
use App\Http\Requests\Admin\ReceptionistUpdateRequest;
use App\Services\Admin\Receptionist\CreateReceptionistService;
use App\Services\Admin\Receptionist\DeleteReceptionistService;
use App\Services\Admin\Receptionist\UpdateReceptionistService;

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

        if($request->has('keyword') && $request->filled('keyword')){
            $query->whereLike(['user.name', 'user.email'],  $request->keyword);
        }

        $receptionists = $query->with('user:id,name,email')->latest()->paginate(20)->withQueryString();

        return inertia('Admin/Receptionist/Index',[
            'receptionists' => $receptionists,
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
     * @param  ReceptionistCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ReceptionistCreateRequest $request)
    {
        (new CreateReceptionistService())->execute($request);

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
     * @param  ReceptionistUpdateRequest  $request
     * @param  Receptionist $receptionist
     * @return \Illuminate\Http\Response
     */
    public function update(ReceptionistUpdateRequest $request, Receptionist $receptionist)
    {
        (new UpdateReceptionistService())->execute($request,$receptionist);

         $this->flashSuccess('Receptionist updated successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Receptionist $receptionist
     * @return \Illuminate\Http\Response
     */
    public function destroy(Receptionist $receptionist)
    {
        (new DeleteReceptionistService())->execute($receptionist);

         $this->flashSuccess('Receptionist deleted successfully');
        return back();
    }

    /**
     * Export data
     *
     * @param  Patient  $patient
     * @return \Illuminate\Http\Response
     */
    public function export($type)
    {
        $name = time().'_receptionists.'.$type;

        return Excel::download(new ReceptionistExport, $name);
    }
}
