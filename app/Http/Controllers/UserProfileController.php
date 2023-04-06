<?php

namespace App\Http\Controllers;

use App\Models\Admin;
use App\Models\Department;
use Illuminate\Http\Request;
use App\Rules\MatchOldPassword;
use App\Models\UserLoginActivity;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\ProfileUpdateRequest;

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
        $user = auth()->user();
        $role = $user->role;

        if ($role == 'patient') {
            $data = $user->load('patient', 'contactInfo');

            return inertia('UserProfile/Role/PatientSetting', compact('data'));
        }elseif ($role == 'doctor') {
            $data = $user->load('doctor', 'contactInfo');
            $departments = Department::all(['id', 'name']);

            return inertia('UserProfile/Role/DoctorSetting', compact('data', 'departments'));
        }else{
            $data = $user->load('contactInfo');

            return inertia('UserProfile/Role/StaffSetting', compact('data'));
        }
    }

    public function settingUpdate(Request $request)
    {
        $user = auth()->user();
        $role = $user->role;

        $request->validate([
            'name' => 'required',
            'username' => "required|unique:users,username,{$user->id}",
            'email' => "required|unique:users,email,{$user->id}",
        ]);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,
            'username' => $request->username,
        ]);

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $request->validate(['avatar' => 'image|mimes:jpeg,png,jpg,svg|max:5120']);
            $url = uploadFileToPublic('avatar', $request->avatar);
            $user->update(['avatar' => $url]);
        }

        $user->contactInfo()->update([
            'address' => $request->address,
            'phone' => $request->phone,
        ]);

        if ($role == 'patient') {
            $user->patient()->update([
                'gender' => $request->gender ?? null,
                'birth_date' => $request->birth_date ?? null,
                'age' => $request->age ?? null,
                'blood_group' => $request->blood_group ?? null,
            ]);

        }elseif ($role == 'doctor') {
            $request->validate(['department' => 'required']);
            $user->doctor()->update([
                'department_id' => $request->department ?? null,
            ]);
        }

        $this->flashSuccess('Profile updated successfully!');
        return back();
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
