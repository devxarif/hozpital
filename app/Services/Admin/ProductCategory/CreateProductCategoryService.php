<?php

namespace App\Services\Admin\ProductCategory;

use App\Models\ProductCategory;

class CreateProductCategoryService
{
    public function execute(object $request): ProductCategory
    {
        $product_category = ProductCategory::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return $product_category;
    }
}
