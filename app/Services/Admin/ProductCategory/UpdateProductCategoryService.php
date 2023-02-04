<?php

namespace App\Services\Admin\ProductCategory;

use App\Models\ProductCategory;

class UpdateProductCategoryService
{
    public function execute(object $request, $product_category): ProductCategory
    {
        $product_category->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return $product_category;
    }
}
