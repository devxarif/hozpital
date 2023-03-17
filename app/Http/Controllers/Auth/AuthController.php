<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Rules\RecaptchaValidationRule;

class AuthController extends Controller
{
    public function showLoginForm()
    {
        if (auth()->check()) {
            return redirect()->route('dashboard');
        }

        $recaptcha_setting = setting(['recaptcha_active', 'recaptcha_site_key']);

        return inertia('Auth/Login', [
            'recaptcha_site_key' => $recaptcha_setting->recaptcha_site_key,
            'recaptcha_active' => $recaptcha_setting->recaptcha_active,
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'recaptcha' => setting('recaptcha_active') ? new RecaptchaValidationRule($request->recaptcha) : '',
        ]);

        if (filter_var(request()->input('username'), FILTER_VALIDATE_EMAIL)) {
            $type = 'email';
        } else {
            $type = 'username';
        }

        $remember = $request->remember ? true : false;
        if (Auth::attempt([$type => $request->username, 'password' => $request->password], $remember)) {
            $request->session()->regenerate();

            session()->flash('success', 'Logged in successfully!');

            return redirect()->intended('/dashboard');
        }

        return back()->withErrors([
            'username' => 'The provided credentials do not match our records.',
        ]);
    }

    public function logout()
    {
        Auth::logout();
        session()->flash('success', 'Logged out successfully!');

        return redirect()->route('login');
    }
}
