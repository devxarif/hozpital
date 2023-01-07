<?php

namespace App\Services\Admin\BloodBank;

use App\Models\BloodBank;

class CreateBloodBankService
{
    public function execute(object $request): BloodBank
    {
        return BloodBank::create([
            'blood_group' => $request->blood_group,
            'bags' => $request->bags,
        ]);
    }
}
