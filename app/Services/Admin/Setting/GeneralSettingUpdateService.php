<?php

namespace App\Services\Admin\Setting;

use App\Models\Setting;

class GeneralSettingUpdateService
{
    public function execute(object $request): bool
    {
        $request->validate([
            'app_name' => 'required',
            'app_copyright' => 'required',
            // 'app_email' => 'required|email',
            // 'app_contact_number' => 'required',
            // 'app_location' => 'required',
        ]);

        // $data['app_location'] = $request->app_location;
        // $data['app_email'] = $request->app_email;
        // $data['app_contact_number'] = $request->app_contact_number;
        checkSetEnv('APP_NAME', $request->app_name);
        $data['app_copyright'] = $request->app_copyright;

        if ($request->hasFile('app_dark_logo') && $request->file('app_dark_logo')->isValid()) {
            $request->validate(['app_dark_logo' => 'image|mimes:jpeg,png,jpg,svg|max:5120']);
            $url = uploadFileToPublic('app_dark_logo', $request->app_dark_logo);
            $data['app_dark_logo'] = $url;
        }

        if ($request->hasFile('app_light_logo') && $request->file('app_light_logo')->isValid()) {
            $request->validate(['app_light_logo' => 'image|mimes:jpeg,png,jpg,svg|max:5120']);
            $url = uploadFileToPublic('app_light_logo', $request->app_light_logo);
            $data['app_light_logo'] = $url;
        }

        if ($request->hasFile('app_favicon') && $request->file('app_favicon')->isValid()) {
            $request->validate(['app_favicon' => 'image|mimes:png,jpg']);
            $url = uploadFileToPublic('app_favicon', $request->app_favicon);
            $data['app_favicon'] = $url;
        }

        Setting::first()->update($data);

        return true;
    }
}
