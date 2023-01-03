<?php

namespace App\Services\Admin\Laboratorist;

class DeleteLaboratoristService
{
    public function execute(object $laboratorist)
    {
        deleteImage($laboratorist->avatar);
        $laboratorist->delete();

        return $laboratorist;
    }
}
