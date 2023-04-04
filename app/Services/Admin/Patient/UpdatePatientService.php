<?php

namespace App\Services\Admin\Patient;

use App\Models\Patient;

class UpdatePatientService
{
    public function execute(object $request, object $patient): Patient
    {
        $this->UpdateUser($request, $patient);

        $patient->update([
            'gender' => $request->gender ?? null,
            'birth_date' => $request->birth_date ?? null,
            'age' => $request->age ?? null,
            'blood_group' => $request->blood_group ?? null,
        ]);

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $url = uploadFileToPublic('patient/avatar', $request->avatar);
            $patient->update(['avatar' => $url]);
        }

        $patient->user->contactInfo()->update([
            'address' => $request->address ?? null,
            'phone' => $request->phone ?? null,
        ]);

        return $patient;
    }

    protected function UpdateUser($request, $patient)
    {
        return $patient->user()->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password) ?? $request->password,
        ]);
    }
}
