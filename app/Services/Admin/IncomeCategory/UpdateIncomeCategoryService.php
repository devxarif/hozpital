<?php

namespace App\Services\Admin\IncomeCategory;

use App\Models\IncomeCategory;

class UpdateIncomeCategoryService
{
    public function execute(object $request, object $income_category): IncomeCategory
    {
        $income_category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return $income_category;
    }
}
