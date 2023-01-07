<?php

namespace App\Services\Admin\MedicineCategory;

use App\Models\MedicineCategory;

class CreateMedicineCategoryService
{
    public function execute(object $request): MedicineCategory
    {
        $medicine_category = MedicineCategory::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return $medicine_category;
    }
}
