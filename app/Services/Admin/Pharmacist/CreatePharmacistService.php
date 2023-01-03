<?php

namespace App\Services\Admin\Pharmacist;

use App\Models\Pharmacist;
use App\Models\User;

class CreatePharmacistService
{
    public function execute(object $request): Pharmacist
    {
        $user = $this->createUser($request);

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $url = uploadFileToPublic('pharmacist/avatar', $request->avatar);
        }

        $pharmacist = $user->pharmacist()->create(['avatar' => $url ?? null]);

        return $pharmacist;
    }

    protected function createUser($request){
        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
    }
}
