<?php

namespace App\Services\Admin\Patient;

use App\Models\Patient;

class FetchPatientService
{
    public function execute(object $request): Array
    {
        $patients = Patient::with('user:id,name,email', 'user.contactInfo')
                ->latest()
                ->paginate(config('kodebazar.rows_per_page'))
                ->withQueryString();

        return [
            'patients' => $patients,
            'filter' => $request,
        ];
    }
}
