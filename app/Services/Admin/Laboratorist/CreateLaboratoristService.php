<?php

namespace App\Services\Admin\Laboratorist;

use App\Models\Laboratorist;
use App\Models\User;

class CreateLaboratoristService
{
    public function execute(object $request): Laboratorist
    {
        $user = $this->createUser($request);

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $url = uploadFileToPublic('laboratorist/avatar', $request->avatar);
        }

        $laboratorist = $user->laboratorist()->create(['avatar' => $url ?? null]);

        return $laboratorist;
    }

    protected function createUser($request)
    {
        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
    }
}
