<?php

namespace App\Services\Admin\MedicineCategory;

use App\Models\MedicineCategory;

class UpdateMedicineCategoryService
{
    public function execute(object $request, $medicine_category): MedicineCategory
    {
        $medicine_category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return $medicine_category;
    }
}
