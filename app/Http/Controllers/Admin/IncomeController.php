<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Income\IncomeCreateRequest;
use App\Http\Requests\Admin\Income\IncomeUpdateRequest;
use App\Models\Income;
use App\Services\Admin\Income\CreateIncomeService;
use App\Services\Admin\Income\UpdateIncomeService;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
     /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        // $query = LeaveType::query();

        // if($request->has('keyword') && $request->filled('keyword')){
        //     $query->whereLike(['name'],  $request->keyword);
        // }

        // $leave_types = $query->latest()->paginate(20)->withQueryString();

        $incomes = Income::latest()->paginate(20)->withQueryString();

        return inertia('Admin/Income/Index', [
            'incomes' => $incomes,
            'filter' => $request
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param IncomeCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(IncomeCreateRequest $request)
    {
        (new CreateIncomeService())->execute($request);

        $this->flashSuccess('Income created successfully!');
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  IncomeUpdateRequest $request
     * @param  Income $income
     * @return \Illuminate\Http\Response
     */
    public function update(IncomeUpdateRequest $request, Income $income)
    {
        (new UpdateIncomeService())->execute($request, $income);

        $this->flashSuccess('Income updated successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Income $income
     * @return \Illuminate\Http\Response
     */
    public function destroy(Income $income)
    {
        $income->delete();

        $this->flashSuccess('Income deleted successfully!');
        return back();
    }
}
