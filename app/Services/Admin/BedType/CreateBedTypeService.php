<?php

namespace App\Services\Admin\BedType;

use App\Models\BedType;

class CreateBedTypeService
{
    public function execute(object $request): BedType
    {
        return BedType::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);
    }
}
