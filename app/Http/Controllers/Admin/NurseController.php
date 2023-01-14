<?php

namespace App\Http\Controllers\Admin;

use App\Models\Nurse;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\NurseCreateRequest;
use App\Http\Requests\Admin\NurseUpdateRequest;
use App\Services\Admin\Nurse\CreateNurseService;
use App\Services\Admin\Nurse\DeleteNurseService;
use App\Services\Admin\Nurse\UpdateNurseService;

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

        if($request->has('keyword') && $request->filled('keyword')){
            $query->whereLike(['user.name', 'user.email'],  $request->keyword);
        }

        $nurses = $query->with('user:id,name,email')->latest()->paginate(20)->withQueryString();

        return inertia('Admin/Nurse/Index',[
            'nurses' => $nurses,
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
     * @param  NurseCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(NurseCreateRequest $request)
    {
        (new CreateNurseService())->execute($request);

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
     * @param  NurseUpdateRequest  $request
     * @param  Doctor  $doctor
     * @return \Illuminate\Http\Response
     */
    public function update(NurseUpdateRequest $request, Nurse $nurse)
    {
        (new UpdateNurseService())->execute($request,$nurse);

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
        (new DeleteNurseService())->execute($nurse);

        $this->flashSuccess('Nurse deleted successfully');
        return back();
    }
}
