<?php

namespace App\Services\Admin\Product;

use App\Models\Product;

class UpdateProductService
{
    public function execute(object $request, $product): Product
    {
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $url = uploadFileToPublic('product/image', $request->image);
        }

        $product->update([
            'product_category_id' => $request->product_category,
            'manufacture_id' => $request->manufacture,
            'type' => $request->type,
            'name' => $request->name,
            'buying_price' => $request->buying_price ?? 0,
            'selling_price' => $request->selling_price,
            'image' => $url ?? $product->image,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'expire_date' => $request->expire_date,
        ]);

        return $product;
    }
}
