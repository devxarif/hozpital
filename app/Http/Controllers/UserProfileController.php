<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Models\UserLoginActivity;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileUpdateRequest;
use App\Models\Admin;

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

        return inertia('UserProfile/Profile', compact('activities'));
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

        Auth::logoutOtherDevices($request->password);

        $this->flashSuccess('Password changed successfully!');
        return back();
    }

    public function setting()
    {
        // return Admin::all();
        return $user = auth()->user();
        $role = $user->role;
        $data['user'] = $user;

        return $user->load('admin');

        return inertia('UserProfile/Setting');
    }

    public function security()
    {
        return inertia('UserProfile/Security');
    }

    public function notification()
    {
        return inertia('UserProfile/Notification');
    }

    public function socialLogin()
    {
        return inertia('UserProfile/SocialLogin');
    }

    public function socialLoginUnlink()
    {
        auth()->user()->update([
            'provider' => null,
            'provider_id' => null,
        ]);

        $this->flashSuccess('Social account disconnected successfully!');
        return back();
    }
}
