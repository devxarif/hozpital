<?php

namespace App\Services\Admin\Pharmacist;

class DeletePharmacistService
{
    public function execute(object $pharmacist)
    {
        deleteImage($pharmacist->avatar);
        $pharmacist->delete();

        return $pharmacist;
    }
}
