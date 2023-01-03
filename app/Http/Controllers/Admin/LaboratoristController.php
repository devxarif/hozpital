<?php

namespace App\Http\Controllers\Admin;

use App\Models\Laboratorist;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\LaboratoristCreateRequest;
use App\Http\Requests\Admin\LaboratoristUpdateRequest;
use App\Services\Admin\Laboratorist\CreateLaboratoristService;
use App\Services\Admin\Laboratorist\DeleteLaboratoristService;
use App\Services\Admin\Laboratorist\UpdateLaboratoristService;

class LaboratoristController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
     * @param LaboratoristCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LaboratoristCreateRequest $request)
    {
        (new CreateLaboratoristService())->execute($request);

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
     * @param  LaboratoristUpdateRequest  $request
     * @param  Laboratorist $laboratorist
     * @return \Illuminate\Http\Response
     */
    public function update(LaboratoristUpdateRequest $request, Laboratorist $laboratorist)
    {
        (new UpdateLaboratoristService())->execute($request,$laboratorist);

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
        (new DeleteLaboratoristService())->execute($laboratorist);

        return back();
    }
}
