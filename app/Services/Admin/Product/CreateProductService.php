<?php

namespace App\Services\Admin\Product;

use App\Models\Product;

class CreateProductService
{
    public function execute(object $request): Product
    {
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $url = uploadFileToPublic('product/image', $request->image);
        }

        $product = Product::create([
            'product_category_id' => $request->product_category,
            'manufacture_id' => $request->manufacture,
            'product_type' => $request->product_type,
            'name' => $request->name,
            'buying_price' => $request->buying_price ?? 0,
            'selling_price' => $request->selling_price,
            'image' => $url ?? null,
            'quantity' => $request->quantity,
            'description' => $request->description ?? null,
            'expire_date' => $request->expire_date ?? null,
        ]);

        return $product;
    }
}
