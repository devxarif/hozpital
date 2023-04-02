<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Events\LoginHistory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Laravel\Socialite\Facades\Socialite;

class SocialLoginController extends Controller
{
    public function redirect($provider)
    {
        session(['social_user' => request('user')]);

        return Socialite::driver($provider)->redirect();
    }

    public function callback($provider)
    {
        try {
            $socialiteUser = Socialite::driver($provider)->user();
        } catch (\Exception $e) {
            return redirect()->route('login');
        }

        $socialiteUserId = $socialiteUser->getId();
        $authenticated = auth()->check();

        if($authenticated){
            $auth_user = auth()->user();

            if (empty($auth_user->provider) && empty($auth_user->provider_id)) {
                $auth_user->update([
                    'provider' => $provider,
                    'provider_id' => $socialiteUserId,
                ]);

                $this->flashSuccess('Social account connected successfully!');
                return redirect()->route('user.profile.socialLogin');
            }

            $this->flashError('You already have a social account connected. Please disconnect it first.');
            return redirect()->route('user.profile.socialLogin');
        }

        if(!$authenticated){
            $user = User::where([
                'provider' => $provider,
                'provider_id' =>  $socialiteUserId,
            ])->first();

            if (!$user) {
                $this->flashError('No user found with this social account. Please login with your email and password first. Then connect your social account from your profile setting page');
                return to_route('login');
            }

            Auth::login($user);

            event(new LoginHistory($provider));
            session()->flash('success', 'Logged in successfully!');
            return redirect()->route('dashboard');
        }
    }
}
