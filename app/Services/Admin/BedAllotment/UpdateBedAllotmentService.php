<?php

namespace App\Services\Admin\BedAllotment;

use App\Models\BedAllotment;

class UpdateBedAllotmentService
{
    public function execute(object $request, $bedAllotment): BedAllotment
    {
        return $bedAllotment->update([
            'bed_id' => $request->bed,
            'patient_id' => $request->patient,
            'doctor_id' => $request->doctor,
            'allotment_time' => $request->allotment_time,
            'discharge_time' => $request->discharge_time,
            'description' => $request->description,
        ]);
    }
}
