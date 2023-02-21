<?php

namespace App\Services\Admin\Accountant;

use App\Models\Accountant;

class UpdateAccountantService
{
    public function execute(object $request, object $accountant): Accountant
    {
        $this->UpdateUser($request, $accountant);

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $url = uploadFileToPublic('accountant/avatar', $request->avatar);
            $accountant->update(['avatar' => $url]);
        }

        return $accountant;
    }

    protected function UpdateUser($request, $accountant)
    {
        return $accountant->user()->update([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password) ?? $request->password,
        ]);
    }
}
