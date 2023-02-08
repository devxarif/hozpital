<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\ExpenseCategory;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Expense\ExpenseCategoryCreateRequest;
use App\Http\Requests\Admin\Expense\ExpenseCategoryUpdateRequest;
use App\Services\Admin\ExpenseCategory\CreateExpenseCategoryService;
use App\Services\Admin\ExpenseCategory\UpdateExpenseCategoryService;

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

        if($request->has('keyword') && $request->filled('keyword')){
            $query->whereLike('name', $request->keyword);
        }

        $expense_categories = $query->latest()->paginate(20)->withQueryString();

        return inertia('Admin/ExpenseCategory/Index', [
            'expense_categories' => $expense_categories,
            'filter' => $request
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param ExpenseCategoryCreateRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(ExpenseCategoryCreateRequest $request)
    {
        (new CreateExpenseCategoryService())->execute($request);

        $this->flashSuccess('Expense category created successfully!');
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  ExpenseCategoryUpdateRequest $request
     * @param  ExpenseCategory $expenseCategory
     * @return \Illuminate\Http\Response
     */
    public function update(ExpenseCategoryUpdateRequest $request, ExpenseCategory $expenseCategory)
    {
        (new UpdateExpenseCategoryService())->execute($request, $expenseCategory);

        $this->flashSuccess('Expense category updated successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  ExpenseCategory $expenseCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpenseCategory $expenseCategory)
    {
        $expenseCategory->delete();

        $this->flashSuccess('Expense category deleted successfully!');
        return back();
    }
}
