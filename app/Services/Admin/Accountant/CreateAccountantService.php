<?php

namespace App\Services\Admin\Accountant;

use App\Models\Accountant;
use App\Models\User;

class CreateAccountantService
{
    public function execute(object $request): Accountant
    {
        $user = $this->createUser($request);

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $url = uploadFileToPublic('accountant/avatar', $request->avatar);
        }

        $accountant = $user->accountant()->create(['avatar' => $url ?? null]);

        return $accountant;
    }

    protected function createUser($request){
        return User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
        ]);
    }
}
