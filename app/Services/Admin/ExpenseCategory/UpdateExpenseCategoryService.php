<?php

namespace App\Services\Admin\ExpenseCategory;

use App\Models\ExpenseCategory;

class UpdateExpenseCategoryService
{
    public function execute(object $request, object $expense_category): ExpenseCategory
    {
        $expense_category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return $expense_category;
    }
}
