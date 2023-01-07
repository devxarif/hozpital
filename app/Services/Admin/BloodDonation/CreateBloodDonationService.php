<?php

namespace App\Services\Admin\BloodDonation;

use App\Models\BloodDonation;

class CreateBloodDonationService
{
    public function execute(object $request): BloodDonation
    {
        return BloodDonation::create([
            'blood_donor_id' => $request->blood_donor,
            'bags' => $request->bags,
        ]);
    }
}
