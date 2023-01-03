<?php

namespace App\Http\Controllers\Admin;

use App\Models\Accountant;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\AccountantCreateRequest;
use App\Http\Requests\Admin\AccountantUpdateRequest;
use App\Services\Admin\Accountant\CreateAccountantService;
use App\Services\Admin\Accountant\DeleteAccountantService;
use App\Services\Admin\Accountant\UpdateAccountantService;

class AccountantController extends Controller
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
     * @param  AccountantCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountantCreateRequest $request)
    {
        (new CreateAccountantService())->execute($request);

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
     * @param  AccountantUpdateRequest  $request
     * @param  Accountant $accountant
     * @return \Illuminate\Http\Response
     */
    public function update(AccountantUpdateRequest $request, Accountant $accountant)
    {
        (new UpdateAccountantService())->execute($request,$accountant);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Accountant $accountant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Accountant $accountant)
    {
        (new DeleteAccountantService())->execute($accountant);

        return back();
    }
}
