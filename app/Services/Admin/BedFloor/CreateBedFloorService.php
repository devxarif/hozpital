<?php

namespace App\Services\Admin\BedFloor;

use App\Models\BedFloor;

class CreateBedFloorService
{
    public function execute(object $request): BedFloor
    {
        $bed_floor = BedFloor::create([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return $bed_floor;
    }
}
