<?php

namespace App\Services\Admin\BloodBank;

use App\Models\BloodBank;

class UpdateBloodBankService
{
    public function execute(object $request, $bloodBank): BloodBank
    {
        return $bloodBank->update([
            'blood_group' => $request->blood_group,
            'bags' => $request->bags,
        ]);
    }
}
