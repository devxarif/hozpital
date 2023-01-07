<?php

namespace App\Services\Admin\Medicine;

use App\Models\Medicine;

class CreateMedicineService
{
    public function execute(object $request): Medicine
    {
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $url = uploadFileToPublic('medicine/image', $request->image);
        }

        $medicine = Medicine::create([
            'medicine_category_id' => $request->medicine_category,
            'manufacture_id' => $request->manufacture,
            'name' => $request->name,
            'buying_price' => $request->buying_price ?? 0,
            'selling_price' => $request->selling_price,
            'image' => $url ?? null,
            'quantity' => $request->quantity,
            'description' => $request->description ?? null,
            'expire_date' => $request->expire_date ?? null,
        ]);

        return $medicine;
    }
}
