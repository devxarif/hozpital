<?php

namespace App\Traits;

use App\Models\User;

trait HasUserUniqueEmail
{
    public function generateUserUniqueEmail($email, $name)
    {
        $email_exists = User::where('email', $email)->exists();

        if ($email_exists) {
            $email = uniqid(str_replace(' ', '_', strtolower($name ?? fake()->name)).'.').'@mail.com';
        }

        return $email;
    }
}
