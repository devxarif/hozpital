<?php

namespace App\Services\Admin\Laboratorist;

use App\Models\Laboratorist;

class UpdateLaboratoristService
{
    public function execute(object $request, object $laboratorist): Laboratorist
    {
        $this->UpdateUser($request, $laboratorist);

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $url = uploadFileToPublic('laboratorist/avatar', $request->avatar);
            $laboratorist->update(['avatar' => $url]);
        }

        return $laboratorist;
    }

    protected function UpdateUser($request, $laboratorist)
    {
        return $laboratorist->user()->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password) ?? $request->password,
        ]);
    }
}
