<?php

namespace App\Http\Controllers\Admin;

use App\Models\Receptionist;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\ReceptionistCreateRequest;
use App\Http\Requests\Admin\ReceptionistUpdateRequest;
use App\Services\Admin\Receptionist\CreateReceptionistService;
use App\Services\Admin\Receptionist\DeleteReceptionistService;
use App\Services\Admin\Receptionist\UpdateReceptionistService;
use Illuminate\Http\Request;

class ReceptionistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $receptionists = Receptionist::with('user:id,name,email')->latest()->paginate(20);

        return inertia('Admin/Receptionist/Index',compact('receptionists'));
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
}
