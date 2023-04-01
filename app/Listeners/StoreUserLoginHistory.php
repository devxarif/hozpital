<?php

namespace App\Listeners;

use Jenssegers\Agent\Agent;
use App\Events\LoginHistory;
use App\Models\UserLoginActivity;
use Illuminate\Queue\InteractsWithQueue;
use Stevebauman\Location\Facades\Location;
use Illuminate\Contracts\Queue\ShouldQueue;

class StoreUserLoginHistory
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle(LoginHistory $event)
    {
        $agent = new Agent();
        $platform = $agent->platform();
        $browser = $agent->browser();

        $ip = request()->ip();
        // $ip = '103.102.27.0'; // Bangladesh
        // $ip = '105.179.161.212'; // Mauritius
        // $ip = '197.246.60.160'; // Egypt
        // $ip = '107.29.65.61'; // United States"
        // $ip = '46.39.160.0'; // Czech Republic
        // $ip = "94.112.58.11"; // Czechia


        $currentUserInfo = Location::get($ip);
        if ($currentUserInfo) {
            $location = "{$currentUserInfo->cityName}, $currentUserInfo->countryName ($ip)";
        }else {
            $location = "Unknown";
        }

        // UserLoginActivity::create([
        //     'device' => $agent->device(),
        //     'platform' => $platform.' '.$agent->version($platform),
        //     'browser' => $browser.' '.$agent->version($browser),
        //     'ip_address' => $ip,
        //     // 'ip_address' => \Request::ip(),
        //     'location' => $location,
        //     'login_type' => 'email', // email, google, facebook, github, twitter
        //     'user_id' => auth()->id(),
        // ]);

        \DB::table('user_login_activities')->insert([
            'device' => $agent->device(),
            'platform' => $platform.' '.$agent->version($platform),
            'browser' => $browser.' '.$agent->version($browser),
            'ip_address' => $ip,
            // 'ip_address' => \Request::ip(),
            'location' => $location,
            'login_type' => $event->type, // email, google, facebook, github, twitter
            'user_id' => auth()->id(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);
    }
}
