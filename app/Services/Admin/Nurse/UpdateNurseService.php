<?php

namespace App\Services\Admin\Nurse;

use App\Models\Nurse;

class UpdateNurseService
{

    public function execute(object $request,  object $nurse): Nurse
    {
        $this->UpdateUser($request, $nurse);

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $url = uploadFileToPublic('nurse/avatar', $request->avatar);
            $nurse->update(['avatar' => $url]);
        }

        return $nurse;
    }

    protected function UpdateUser($request, $nurse){
        return $nurse->user()->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password) ?? $request->password,
        ]);
    }
}
