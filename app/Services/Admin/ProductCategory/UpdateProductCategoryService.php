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

        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            deleteImage($product_category->image);
            $url = uploadFileToPublic('productcategory/image', $request->image);
            $product_category->update(['image' => $url]);
        }

        return $product_category;
    }
}
