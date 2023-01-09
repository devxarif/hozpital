<?php

namespace App\Services\Admin\BedFloor;

use App\Models\BedFloor;

class UpdateBedFloorService
{
    public function execute(object $request, object $bed_floor): BedFloor
    {
        $bed_floor->update([
            'name' => $request->name,
            'description' => $request->description,
        ]);

        return $bed_floor;
    }
}
