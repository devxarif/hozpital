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

        return inertia('Auth/Login', [
            'recaptcha_site_key' => config('kodebazar.recaptcha_site_key'),
            'recaptcha_secret_key' => config('kodebazar.recaptcha_secret_key'),
            'recaptcha_active' => config('kodebazar.recaptcha_active'),
        ]);
    }

    public function login(Request $request)
    {
        $request->validate([
            'username' => 'required',
            'password' => 'required',
            'recaptcha' => config('kodebazar.recaptcha_active') ? new RecaptchaValidationRule($request->recaptcha) : '',
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
