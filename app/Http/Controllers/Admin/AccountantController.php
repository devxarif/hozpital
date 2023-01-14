<?php

namespace App\Http\Controllers\Admin;

use App\Models\Accountant;
use Illuminate\Http\Request;
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
    public function index(Request $request)
    {
        $query = Accountant::query();

        if($request->has('keyword') && $request->filled('keyword')){
            $query->whereLike(['user.name', 'user.email'],  $request->keyword);
        }

        $accountants = $query->with('user:id,name,email')->latest()->paginate(20)->withQueryString();

        return inertia('Admin/Accountant/Index',[
            'accountants' => $accountants,
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
     * @param  AccountantCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AccountantCreateRequest $request)
    {
        (new CreateAccountantService())->execute($request);

        $this->flashSuccess('Accountant created successfully');
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

        $this->flashSuccess('Accountant updated successfully');
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

        $this->flashSuccess('Accountant deleted successfully');
        return back();
    }
}
