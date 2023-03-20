<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;

class SettingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Setting table
        $setting = new Setting;

        // Brand info
        $setting->app_email = 'kodebazar@gmail.com';
        $setting->app_copyright = 'Copyright © 2022 Hozpital All rights reserved.';
        $setting->app_contact_number = '+880123456789';
        $setting->app_location = 'Dhaka, Bangladesh';
        $setting->app_logo = 'assets/img/hozpital_red_logo.svg';
        $setting->app_favicon = 'assets/img/favicon.png';

        // Social link table
        $setting->facebook = 'https://www.facebook.com/Kodebazaar';
        $setting->twitter = 'https://twitter.com/';
        $setting->instagram = 'https://www.instagram.com/';
        $setting->youtube = 'https://www.youtube.com/channel/UCXeJ26hZ-yKza1fc5bPP3YA';
        $setting->linkedin = 'https://www.linkedin.com/';
        $setting->pinterest = 'https://www.pinterest.com/';

        // Cookies alert
        $setting->cookies_alert_active = true;
        $setting->cookies_alert_message = 'This website uses cookies to ensure you get the best experience on our website.';
        $setting->cookies_alert_button_text = 'Got it';

        $setting->save();
    }
}
