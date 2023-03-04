<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Expense\ExpenseCreateRequest;
use App\Http\Requests\Admin\Expense\ExpenseUpdateRequest;
use App\Models\Expense;
use App\Models\ExpenseCategory;
use App\Services\Admin\Expense\CreateExpenseService;
use App\Services\Admin\Expense\UpdateExpenseService;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = Expense::query();
        if($request->has('keyword') && $request->filled('keyword')) {
            $query->whereLike(['invoice_number', 'title'], $request->keyword);
        }
        if($request->has('category') && $request->filled('category')) {
            $query->where('expense_category_id', $request->category);
        }

        $expenses = $query->with('expenseCategory:id,name')->latest()->paginate(20)->withQueryString();

        return inertia('Admin/Finance/Expense/Index', [
            'expenses' => $expenses,
            'expense_categories' => ExpenseCategory::latest()->get(['id', 'name']),
            'filter' => $request,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ExpenseCreateRequest $request)
    {
        (new CreateExpenseService)->execute($request);

        $this->flashSuccess('Expense created successfully!');

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ExpenseUpdateRequest $request, Expense $expense)
    {
        (new UpdateExpenseService)->execute($request, $expense);

        $this->flashSuccess('Expense updated successfully!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();

        $this->flashSuccess('Expense deleted successfully!');

        return back();
    }
}
