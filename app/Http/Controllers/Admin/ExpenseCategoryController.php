<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Expense\ExpenseCategoryCreateRequest;
use App\Http\Requests\Admin\Expense\ExpenseCategoryUpdateRequest;
use App\Models\ExpenseCategory;
use App\Services\Admin\ExpenseCategory\CreateExpenseCategoryService;
use App\Services\Admin\ExpenseCategory\UpdateExpenseCategoryService;
use Illuminate\Http\Request;

class ExpenseCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = ExpenseCategory::query();

        if($request->has('keyword') && $request->filled('keyword')) {
            $query->whereLike('name', $request->keyword);
        }

        $expense_categories = $query->latest()->paginate(config('kodebazar.rows_per_page'))->withQueryString();

        return inertia('Admin/Finances/ExpenseCategory/Index', [
            'expense_categories' => $expense_categories,
            'filter' => $request,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(ExpenseCategoryCreateRequest $request)
    {
        (new CreateExpenseCategoryService)->execute($request);

        $this->flashSuccess('Expense category created successfully!');

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(ExpenseCategoryUpdateRequest $request, ExpenseCategory $expenseCategory)
    {
        (new UpdateExpenseCategoryService)->execute($request, $expenseCategory);

        $this->flashSuccess('Expense category updated successfully!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpenseCategory $expenseCategory)
    {
        $expenseCategory->delete();

        $this->flashSuccess('Expense category deleted successfully!');

        return back();
    }
}
