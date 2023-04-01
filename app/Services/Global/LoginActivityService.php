<?php

namespace App\Services;
use App\Models\UserLoginActivity;
use Jenssegers\Agent\Agent;

class ActivityService {

    protected $userLoginActivity;

    public function __construct(UserLoginActivity $userLoginActivity) {
        $this->userLoginActivity = $userLoginActivity;
    }

    public function enterActivity($user_activity,$email){
        $agent = new Agent();
        $platform = $agent->platform();
        // Ubuntu, Windows, OS X, ...
        $browser = $agent->browser();
        // Chrome, IE, Safari, Firefox, ...
        $this->userLoginActivity->create([
            'platform' => $agent->version($platform),
            'browser' => $agent->version($browser),
            'device' => $agent->device(),
            'ip_address' => \Request::ip(),
            'user_id' => null,
            'user_email' => $email,
            'user_activity' => $user_activity
        ]);
    }
}
