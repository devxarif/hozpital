<?php

namespace App\Services\Admin\BedType;

use App\Models\BedType;

class UpdateBedTypeService
{
    public function execute(object $request, $bedType): BedType
    {
        $bedType->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return $bedType;
    }
}
