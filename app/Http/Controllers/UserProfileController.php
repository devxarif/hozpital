<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\UserLoginActivity;

class UserProfileController extends Controller
{
    public function profile()
    {
        // return 123;
        // $user = auth()->user();
        // $role = $user->role;
        // $data['user'] = $user;

        // if ($role == 'owner') {
        //     $data['countries'] = Country::all(['id', 'name']);
        // }elseif($role == 'employee') {
        //     $data['user'] = $user->load('employee');
        // }

        $activities = UserLoginActivity::where('user_id', auth()->id())->latest()->paginate(10);

        return inertia('Profile', compact('activities'));
    }

    public function passwordUpdate(ProfileUpdateRequest $request)
    {
        $request->validate([
            'current_password' => ['required', new MatchOldPassword],
            'password' => ['required'],
            'password_confirmation' => ['required', 'same:password'],
        ]);

        auth()->user()->update([
            'password' => bcrypt($request->password),
        ]);

        $this->flashSuccess('Password changed successfully!');
        return back();
    }

    public function setting()
    {
        return inertia('UserProfile/Setting');
    }

    public function security()
    {
        return inertia('UserProfile/Security');
    }
}
