<?php

namespace App\Services\Admin\BloodDonor;

use App\Models\BloodDonor;

class UpdateBloodDonorService
{
    public function execute(object $request, $bloodDonation): BloodDonor
    {
        $bloodDonation->update([
            'name' => $request->name,
            'blood_group' => $request->blood_group,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'age' => $request->age,
        ]);

        return $bloodDonation;
    }
}
