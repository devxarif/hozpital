<?php

namespace App\Services\Admin\Patient;

class DeletePatientService
{
    public function execute(object $patient)
    {
        deleteImage($patient->avatar);
        $patient->delete();

        return $patient;
    }
}
