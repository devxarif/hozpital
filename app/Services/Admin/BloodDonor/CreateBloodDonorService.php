<?php

namespace App\Services\Admin\BloodDonor;

use App\Models\BloodDonor;

class CreateBloodDonorService
{
    public function execute(object $request): BloodDonor
    {
        return BloodDonor::create([
            'name' => $request->name,
            'blood_group' => $request->blood_group,
            'gender' => $request->gender,
            'phone' => $request->phone,
            'email' => $request->email,
            'address' => $request->address,
            'age' => $request->age,
            'last_donation_date' => $request->last_donation_date,
        ]);
    }
}
