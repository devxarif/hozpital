<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Income\IncomeCategoryCreateRequest;
use App\Http\Requests\Admin\Income\IncomeCategoryUpdateRequest;
use App\Models\IncomeCategory;
use App\Services\Admin\IncomeCategory\CreateIncomeCategoryService;
use App\Services\Admin\IncomeCategory\UpdateIncomeCategoryService;
use Illuminate\Http\Request;

class IncomeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = IncomeCategory::query();

        if($request->has('keyword') && $request->filled('keyword')) {
            $query->whereLike('name', $request->keyword);
        }

        $income_categories = $query->latest()->paginate(20)->withQueryString();

        return inertia('Admin/IncomeCategory/Index', [
            'income_categories' => $income_categories,
            'filter' => $request,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(IncomeCategoryCreateRequest $request)
    {
        (new CreateIncomeCategoryService)->execute($request);

        $this->flashSuccess('Income category created successfully!');

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(IncomeCategoryUpdateRequest $request, IncomeCategory $incomeCategory)
    {
        (new UpdateIncomeCategoryService)->execute($request, $incomeCategory);

        $this->flashSuccess('Income category updated successfully!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(IncomeCategory $incomeCategory)
    {
        $incomeCategory->delete();

        $this->flashSuccess('Income category deleted successfully!');

        return back();
    }
}
