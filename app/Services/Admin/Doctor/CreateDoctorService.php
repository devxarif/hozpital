<?php

namespace App\Services\Admin\Doctor;

use App\Models\Doctor;
use App\Models\User;

class CreateDoctorService
{
    public function execute(object $request): Doctor
    {
        $user = $this->createUser($request);

        $doctor = $user->doctor()->create(['department_id' => $request->department]);

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $url = uploadFileToPublic('doctor/avatar', $request->avatar);
            $doctor->update(['avatar' => $url]);
        }

        return $doctor;
    }

    protected function createUser($request){
        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
    }
}
