<?php

namespace App\Http\Controllers\Admin;

use App\Models\Expense;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Services\Admin\Expense\CreateExpenseService;
use App\Services\Admin\Expense\UpdateExpenseService;
use App\Http\Requests\Admin\Expense\ExpenseCreateRequest;
use App\Http\Requests\Admin\Expense\ExpenseUpdateRequest;

class ExpenseController extends Controller
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

        $expenses = Expense::latest()->paginate(20)->withQueryString();

        return inertia('Admin/Expense/Index', [
            'expenses' => $expenses,
            'filter' => $request
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ExpenseCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExpenseCreateRequest $request)
    {
        (new CreateExpenseService())->execute($request);

        $this->flashSuccess('Expense created successfully!');
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ExpenseUpdateRequest $request
     * @param  Expense $expense
     * @return \Illuminate\Http\Response
     */
    public function update(ExpenseUpdateRequest $request, Expense $expense)
    {
        (new UpdateExpenseService())->execute($request, $expense);

        $this->flashSuccess('Expense updated successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  Expense $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();

        $this->flashSuccess('Expense deleted successfully!');
        return back();
    }
}
