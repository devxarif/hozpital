<?php

namespace App\Services\Admin\Pharmacist;

use App\Models\Pharmacist;

class UpdatePharmacistService
{
    public function execute(object $request, object $pharmacist): Pharmacist
    {
        $this->UpdateUser($request, $pharmacist);

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $url = uploadFileToPublic('pharmacist/avatar', $request->avatar);
            $pharmacist->update(['avatar' => $url]);
        }

        return $pharmacist;
    }

    protected function UpdateUser($request, $pharmacist)
    {
        return $pharmacist->user()->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password) ?? $request->password,
        ]);
    }
}
