<?php

namespace App\Services\Doctor;

use App\Models\Prescription;
use App\Models\PrescriptionMedicine;

class CreatePrescriptionService
{
    public function execute(object $request): Prescription
    {
        $prescription = Prescription::create([
            'doctor_id' => currentDoctor()->id,
            'patient_id' => $request->patient,
            'date' => $request->date,
            'case' => $request->case,
            'note' => $request->note,
            'advice' => $request->advice,
        ]);

        $this->prescriptionMedicine($prescription, $request->medicines);

        return $prescription;
    }

    protected function prescriptionMedicine($prescription, $medicines){

        if ($medicines && count($medicines) && $prescription) {
            foreach ($medicines as $medicine) {
                $prescription->medicines()->create([
                    'medicine' => $medicine['medicine'] ?? '',
                    'frequency' => $medicine['frequency'] ?? '',
                    'days' => $medicine['days'] ?? '',
                ]);
            }
        }

        return true;
    }
}
