<?php

namespace App\Services\Admin\Patient;

use App\Models\User;
use App\Models\Patient;

class CreatePatientService
{
    public function execute(object $request): Patient
    {
        $user = $this->createUser($request);

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $url = uploadFileToPublic('patient/avatar', $request->avatar);
        }

        $patient = $user->patient()->create([
            'avatar' => $url ?? null,
            'address' => $request->address ?? null,
            'phone' => $request->phone ?? null,
            'gender' => $request->gender ?? null,
            'birth_date' => $request->birth_date ?? null,
            'age' => $request->age ?? null,
            'blood_group' => $request->blood_group ?? null,

        ]);

        return $patient;
    }

    protected function createUser($request){
        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
    }
}
