<?php

namespace App\Services\Admin\Nurse;

use App\Models\Nurse;
use App\Models\User;

class CreateNurseService
{
    public function execute(object $request): Nurse
    {
        $user = $this->createUser($request);

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $url = uploadFileToPublic('nurse/avatar', $request->avatar);
        }

        $nurse = $user->nurse()->create(['avatar' => $url ?? null]);

        return $nurse;
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
