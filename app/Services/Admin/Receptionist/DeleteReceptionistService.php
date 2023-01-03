<?php

namespace App\Services\Admin\Receptionist;

class DeleteReceptionistService
{
    public function execute(object $receptionist)
    {
        deleteImage($receptionist->avatar);
        $receptionist->delete();

        return $receptionist;
    }
}
