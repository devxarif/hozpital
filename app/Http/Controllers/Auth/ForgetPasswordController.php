<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Notifications\ResetPassword;
use Illuminate\Http\Request;

class ForgetPasswordController extends Controller
{
    public function passwordEmail()
    {
        if (auth()->check()) {
            return redirect()->route('dashboard');
        }

        return inertia('Auth/Email');
    }

    public function sendCode(Request $request)
    {
        $this->validate($request, [
            'username' => 'required|string',
        ]);

        $user = User::where('email', $request->username)->orWhere('username', $request->username)->first();
        $code = rand(1000, 9999);

        if (! $user) {
            session()->flash('error', 'Email not found');

            return back();
        }

        if (checkMailConfig()) {
            $user->notify(new ResetPassword($code));
        } else {
            session()->flash('error', 'Mail not configured');

            return back();
        }

        $user->update(['code' => $code]);

        session()->flash('success', 'We have emailed your password reset code');

        return redirect()->route('password.reset.form', $user->email);
    }

    public function passwordResetForm($username)
    {
        return inertia('Auth/Reset', compact('username'));
    }

    public function passwordReset(Request $request)
    {
        $this->validate($request, [
            'code' => 'required|numeric',
            'password' => 'required|string',
        ]);

        $user = User::where('email', $request->username)->orWhere('username', $request->username)->first();

        if (! $user) {
            session()->flash('error', 'User not found');

            return back();
        }

        if ($user->code != $request->code) {
            session()->flash('error', 'Code mismatch');

            return back();
        }

        $user->update(['password' => bcrypt($request->password)]);

        session()->flash('success', 'Password changed successfully');

        return redirect()->route('login');
    }
}
