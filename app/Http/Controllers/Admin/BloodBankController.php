<?php

namespace App\Http\Controllers\Admin;

use App\Models\BloodBank;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\BloodBank\CreateBloodBankService;
use App\Services\Admin\BloodBank\UpdateBloodBankService;
use App\Http\Requests\Admin\BloodBank\BloodBankCreateRequest;
use App\Http\Requests\Admin\BloodBank\BloodBankUpdateRequest;

class BloodBankController extends Controller
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
     * @param  BloodBankCreateRequest $request
     * @return \Illuminate\Http\Response
     */
    public function store(BloodBankCreateRequest $request)
    {
        (new CreateBloodBankService())->execute($request);

        $this->flashSuccess('Blood bank created successfully');
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(BloodBank $bloodBank)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(BloodBank $bloodBank)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  BloodBankUpdateRequest $request
     * @param  BloodBank $bloodBank
     * @return \Illuminate\Http\Response
     */
    public function update(BloodBankUpdateRequest $request, BloodBank $bloodBank)
    {
        (new UpdateBloodBankService())->execute($request, $bloodBank);

        $this->flashSuccess('Blood bank updated successfully');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  BloodBank $bloodBank
     * @return \Illuminate\Http\Response
     */
    public function destroy(BloodBank $bloodBank)
    {
        $bloodBank->delete();

        $this->flashSuccess('Blood bank deleted successfully');
        return back();
    }
}
