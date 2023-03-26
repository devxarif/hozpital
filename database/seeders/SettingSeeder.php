<?php

namespace Database\Seeders;

use App\Models\Setting;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

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
        $setting->app_dark_logo = 'assets/img/hozpital_red_logo.svg';
        $setting->app_light_logo = 'assets/img/hozpital_logo.svg';
        $setting->app_favicon = 'assets/img/favicon.svg';

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

        // Custom css/js
        $setting->custom_footer_script = "(function () {var options = {
            whatsapp: '+8801681729831',
            call_to_action: 'Quick Support',
            button_color: '#FF6550',
            position: 'right',
        };
        var proto = 'https:', host = 'getbutton.io', url = proto + '//static.' + host;
        var s = document.createElement('script'); s.type = 'text/javascript'; s.async = true; s.src = url + '/widget-send-button/js/init.js';
        s.onload = function () { WhWidgetSendButton.init(host, proto, options); };
        var x = document.getElementsByTagName('script')[0]; x.parentNode.insertBefore(s, x);
        })()";

        $setting->save();

        // Timezone table
        $path = base_path('resources/json/timezones.json');
        $timezones = json_decode(file_get_contents($path), true);

        foreach ($timezones as $zone) {
            DB::table('timezones')->insert([
                'value' => $zone['value'],
                'label' => $zone['label']
            ]);
        }
    }
}
