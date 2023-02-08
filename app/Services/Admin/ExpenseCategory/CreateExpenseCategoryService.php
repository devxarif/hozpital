<?php

namespace App\Services\Admin\ExpenseCategory;

use App\Models\ExpenseCategory;

class CreateExpenseCategoryService
{
    public function execute(object $request): ExpenseCategory
    {
        $expense_category = ExpenseCategory::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return $expense_category;
    }
}
