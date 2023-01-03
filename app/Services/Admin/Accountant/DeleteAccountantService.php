<?php

namespace App\Services\Admin\Accountant;

class DeleteAccountantService
{
    public function execute(object $nurse)
    {
        deleteImage($nurse->avatar);
        $nurse->delete();

        return $nurse;
    }
}
