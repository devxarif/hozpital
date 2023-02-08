<?php

namespace App\Services\Admin\IncomeCategory;

use App\Models\IncomeCategory;

class CreateIncomeCategoryService
{
    public function execute(object $request): IncomeCategory
    {
        $income_category = IncomeCategory::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return $income_category;
    }
}
