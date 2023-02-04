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

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $url = uploadFileToPublic('productcategory/image', $request->image);
            $product_category->update(['image' => $url]);
        }

        return $product_category;
    }
}
