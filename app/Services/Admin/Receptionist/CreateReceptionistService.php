<?php

namespace App\Services\Admin\Receptionist;

use App\Models\Receptionist;
use App\Models\User;

class CreateReceptionistService
{
    public function execute(object $request): Receptionist
    {
        $user = $this->createUser($request);

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $url = uploadFileToPublic('receptionist/avatar', $request->avatar);
        }

        $receptionist = $user->receptionist()->create(['avatar' => $url ?? null]);

        return $receptionist;
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
