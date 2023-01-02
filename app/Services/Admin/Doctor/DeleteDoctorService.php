<?php

namespace App\Services\Admin\Doctor;

class DeleteDoctorService
{
    public function execute(object $doctor)
    {
        deleteImage($doctor->avatar);
        $doctor->delete();

        return $doctor;
    }
}
