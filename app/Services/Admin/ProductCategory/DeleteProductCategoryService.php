<?php

namespace App\Services\Admin\ProductCategory;

use App\Models\ProductCategory;

class DeleteProductCategoryService
{
    public function execute($product_category): ProductCategory
    {
        deleteImage($product_category->image);
        $product_category->delete();

        return $product_category;
    }
}
