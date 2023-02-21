<?php

namespace App\Services\Admin\Doctor;

use App\Models\Doctor;

class UpdateDoctorService
{
    public function execute(object $request, object $doctor): Doctor
    {
        $this->UpdateUser($request, $doctor);

        $doctor->update(['department_id' => $request->department]);

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $url = uploadFileToPublic('doctor/avatar', $request->avatar);
            $doctor->update(['avatar' => $url]);
        }

        return $doctor;
    }

    protected function UpdateUser($request, $doctor)
    {
        return $doctor->user()->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password) ?? $request->password,
        ]);
    }
}
