<?php

namespace App\Services\Admin\Medicine;

use App\Models\Medicine;

/**
 * Class UpdateMedicineService
 * @package App\Services
 */
class UpdateMedicineService
{
    public function execute(object $request, $medicine): Medicine
    {
        if ($request->hasFile('image') && $request->file('image')->isValid()) {
            $url = uploadFileToPublic('medicine/image', $request->image);
        }

        $medicine->update([
            'medicine_category_id' => $request->medicine_category,
            'manufacture_id' => $request->manufacture,
            'name' => $request->name,
            'buying_price' => $request->buying_price ?? 0,
            'selling_price' => $request->selling_price,
            'image' => $url ??  $medicine->image,
            'quantity' => $request->quantity,
            'description' => $request->description,
            'expire_date' => $request->expire_date,
        ]);

        return $medicine;
    }
}
