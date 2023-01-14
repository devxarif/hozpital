<?php

namespace App\Http\Controllers\Admin;

use App\Models\Pharmacist;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PharmacistCreateRequest;
use App\Http\Requests\Admin\PharmacistUpdateRequest;
use App\Services\Admin\Pharmacist\CreatePharmacistService;
use App\Services\Admin\Pharmacist\DeletePharmacistService;
use App\Services\Admin\Pharmacist\UpdatePharmacistService;

class PharmacistController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Pharmacist::query();

        if($request->has('keyword') && $request->filled('keyword')){
            $query->whereLike(['user.name', 'user.email'],  $request->keyword);
        }

        $pharmacists = $query->with('user:id,name,email')->latest()->paginate(20)->withQueryString();

        return inertia('Admin/Pharmacist/Index',[
            'pharmacists' => $pharmacists,
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
     * @param  PharmacistCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(PharmacistCreateRequest $request)
    {
        (new CreatePharmacistService())->execute($request);

        $this->flashSuccess('Pharmacist created successfully');
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
     * @param  Pharmacist  $request
     * @param  Pharmacist  $pharmacist
     * @return \Illuminate\Http\Response
     */
    public function update(PharmacistUpdateRequest $request, Pharmacist $pharmacist)
    {
        (new UpdatePharmacistService())->execute($request,$pharmacist);

        $this->flashSuccess('Pharmacist updated successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pharmacist $pharmacist)
    {
        (new DeletePharmacistService())->execute($pharmacist);

        $this->flashSuccess('Pharmacist deleted successfully');
        return back();
    }
}
