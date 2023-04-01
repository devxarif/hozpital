<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserProfileController extends Controller
{
    public function setting()
    {
        return inertia('UserProfile/Setting');
    }

    public function security()
    {
        return inertia('UserProfile/Security');
    }
}
