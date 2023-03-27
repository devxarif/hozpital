<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Income\IncomeCreateRequest;
use App\Http\Requests\Admin\Income\IncomeUpdateRequest;
use App\Models\Income;
use App\Models\IncomeCategory;
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
        $query = Income::query();
        if($request->has('keyword') && $request->filled('keyword')) {
            $query->whereLike(['invoice_number', 'title'], $request->keyword);
        }
        if($request->has('category') && $request->filled('category')) {
            $query->where('income_category_id', $request->category);
        }

        $incomes = $query->with('incomeCategory:id,name')->latest()->paginate(config('kodebazar.rows_per_page'))->withQueryString();

        return inertia('Admin/Finances/Income/Index', [
            'incomes' => $incomes,
            'incomes_categories' => IncomeCategory::latest()->get(['id', 'name']),
            'filter' => $request,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(IncomeCreateRequest $request)
    {
        (new CreateIncomeService)->execute($request);

        $this->flashSuccess('Income created successfully!');
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(IncomeUpdateRequest $request, Income $income)
    {
        (new UpdateIncomeService)->execute($request, $income);

        $this->flashSuccess('Income updated successfully!');
        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(Income $income)
    {
        $income->delete();

        $this->flashSuccess('Income deleted successfully!');
        return back();
    }
}
