<?php

namespace App\Services\Admin\Patient;

use App\Models\Patient;

class UpdatePatientService
{
    public function execute(object $request, object $patient): Patient
    {
        $this->UpdateUser($request, $patient);

        $patient->update([
            'address' => $request->address ?? null,
            'phone' => $request->phone ?? null,
            'gender' => $request->gender ?? null,
            'birth_date' => $request->birth_date ?? null,
            'age' => $request->age ?? null,
            'blood_group' => $request->blood_group ?? null,
        ]);

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $url = uploadFileToPublic('patient/avatar', $request->avatar);
            $patient->update(['avatar' => $url]);
        }

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
