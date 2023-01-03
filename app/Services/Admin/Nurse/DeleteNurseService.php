<?php

namespace App\Services\Admin\Nurse;

class DeleteNurseService
{
    public function execute(object $nurse)
    {
        deleteImage($nurse->avatar);
        $nurse->delete();

        return $nurse;
    }
}
