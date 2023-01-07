<?php

namespace App\Services\Admin\BloodDonation;

use App\Models\BloodDonation;

class UpdateBloodDonationService
{
    public function execute(object $request, $bloodDonation): BloodDonation
    {
        return $bloodDonation->update([
            'blood_donor_id' => $request->blood_donor,
            'bags' => $request->bags,
        ]);
    }
}
