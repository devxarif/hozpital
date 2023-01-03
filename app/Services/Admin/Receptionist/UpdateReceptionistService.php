<?php

namespace App\Services\Admin\Receptionist;

use App\Models\Receptionist;

class UpdateReceptionistService
{
    public function execute(object $request,  object $receptionist): Receptionist
    {
        $this->UpdateUser($request, $receptionist);

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $url = uploadFileToPublic('receptionist/avatar', $request->avatar);
            $receptionist->update(['avatar' => $url]);
        }

        return $receptionist;
    }

    protected function UpdateUser($request, $receptionist){
        return $receptionist->user()->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password) ?? $request->password,
        ]);
    }
}
