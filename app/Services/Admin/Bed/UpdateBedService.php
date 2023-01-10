<?php

namespace App\Services\Admin\Bed;

use App\Models\Bed;

class UpdateBedService
{
    public function execute(object $request, $bed): Bed
    {
        $bed->update([
            'bed_type_id' => $request->bed_type,
            'bed_floor_id' => $request->floor,
            'number' => $request->number,
            'charge' => $request->charge,
            'status' => $request->status,
            'description' => $request->description,
        ]);

        return $bed;
    }
}
