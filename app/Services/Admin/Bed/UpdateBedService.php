<?php

namespace App\Services\Admin\Bed;

use App\Models\Bed;

class UpdateBedService
{
    public function execute(object $request, $bed): Bed
    {
        return $bed->update([
            'bed_type_id' => $request->bed_type,
            'number' => $request->number,
            'charge' => $request->charge,
            'floor' => $request->floor,
            'status' => $request->status,
            'description' => $request->description,
        ]);
    }
}
