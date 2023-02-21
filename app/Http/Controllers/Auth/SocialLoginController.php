<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Str;
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
        $socialiteUserName = $socialiteUser->getName();
        $socialiteUseremail = $socialiteUser->getEmail();

        return [
            'user_id' => $socialiteUserId,
            'user_name' => $socialiteUserName,
            'user_email' => $socialiteUseremail,
        ];

        // $user = User::where([
        //     'provider' => $provider,
        //     'provider_id' =>  $socialiteUserId,
        // ])->first();

        // if (!$user) {

        //     $validator = Validator::make(
        //         ['email' => $socialiteUseremail],
        //         ['email' => ['unique:users,email']],
        //         ['email.unique' => 'Couldn\'t login. Maybe you used a different login method?'],
        //     );

        //     if ($validator->fails()) {
        //         return redirect()->route('login')->withErrors($validator);
        //     }

        //     $user = User::create([
        //         'name' => $socialiteUserName,
        //         'email' => $socialiteUseremail,
        //         'username' => Str::slug($socialiteUserName) . '_' . Str::random(5),
        //         'provider' => $provider,
        //         'provider_id' =>  $socialiteUserId,
        //         'role' => session('social_user') == 'candidate' ? 'candidate' : 'company',
        //         'email_verified_at' => now(),
        //     ]);

        //     $admins = Admin::all();
        //     foreach ($admins as $admin) {
        //         $admin->notify(new NewUserRegisteredNotification($admin, $user));
        //     }
        // }

        // Auth::guard('user')->login($user);

        // return redirect()->route('user.dashboard');
    }
}
