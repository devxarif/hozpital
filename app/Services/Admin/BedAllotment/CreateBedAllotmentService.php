<?php

namespace App\Services\Admin\BedAllotment;

use App\Models\BedAllotment;

class CreateBedAllotmentService
{
    public function execute(object $request): BedAllotment
    {
        $bed_allotment = BedAllotment::create([
            'bed_id' => $request->bed,
            'patient_id' => $request->patient,
            'doctor_id' => $request->doctor,
            'allotment_time' => $request->allotment_time,
            'discharge_time' => $request->discharge_time,
            'description' => $request->description,
            'status' => 1
        ]);

        // Update bed allotment status
        BedAllotment::where('bed_id', $request->bed)->where('id', '!=', $bed_allotment->id)->update(['status' => 0]);

        // Update bed status
        $bed_allotment->bed()->update(['status' => 'alloted']);

        return $bed_allotment;
    }
}
