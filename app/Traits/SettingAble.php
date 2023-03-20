<?php

namespace App\Traits;

use App\Models\Cms;
use App\Models\Currency;
use App\Models\Seo;
use App\Models\Setting;

trait SettingAble
{
    public function getSeo()
    {
        $seo = Seo::all();

        return $seo;
    }

    public function updateSeoContent($request, $seo)
    {
        $request->validate([
            'title' => 'required',
            'description' => 'required',
            'keywords' => 'required',
        ]);

        $seo->update([
            'title' => $request->title,
            'description' => $request->description,
            'keywords' => $request->keywords,
        ]);

        return true;
    }

    public function updateBrandInfo($request)
    {
        $request->validate([
            'app_name' => 'required',
            'app_email' => 'required|email',
            'app_contact_number' => 'required',
            'app_copyright' => 'required',
            'app_location' => 'required',
        ]);

        checkSetEnv('APP_NAME', $request->app_name);
        $data['app_email'] = $request->app_email;
        $data['app_contact_number'] = $request->app_contact_number;
        $data['app_copyright'] = $request->app_copyright;
        $data['app_location'] = $request->app_location;

        if ($request->hasFile('app_logo') && $request->file('app_logo')->isValid()) {
            $request->validate(['app_logo' => 'image|mimes:jpeg,png,jpg']);
            $url = uploadFileToPublic('app_logo', $request->app_logo);
            $data['app_logo'] = $url;
        }

        if ($request->hasFile('app_favicon') && $request->file('app_favicon')->isValid()) {
            $request->validate(['app_favicon' => 'image|mimes:jpeg,png,jpg']);
            $url = uploadFileToPublic('app_favicon', $request->app_favicon);
            $data['app_favicon'] = $url;
        }

        Setting::first()->update($data);

        return true;
    }

    public function updateSocialMedia($request)
    {
        $request->validate([
            'facebook' => 'nullable|url',
            'twitter' => 'nullable|url',
            'linkedin' => 'nullable|url',
            'youtube' => 'nullable|url',
            'instagram' => 'nullable|url',
            'pinterest' => 'nullable|url',
        ]);

        Setting::first()->update([
            'facebook' => $request->facebook ?? '',
            'twitter' => $request->twitter ?? '',
            'linkedin' => $request->linkedin ?? '',
            'youtube' => $request->youtube ?? '',
            'instagram' => $request->instagram ?? '',
            'pinterest' => $request->pinterest ?? '',
        ]);
    }

    public function updateCmsData($data)
    {
        $cms = Cms::first();

        switch ($data->type) {
            case 'home':
                $validated = $this->validate($data, [
                    'home_banner_title' => 'required|max:255',
                    'home_banner_description' => 'required',
                    'home_banner_button_text' => 'required',
                    'home_banner_button2_text' => 'required',
                    'home_banner_button_url' => 'required|url',
                    'home_banner_button2_url' => 'required|url',
                    'home_feature_title' => 'required|max:255',
                    'home_feature_subtitle' => 'required|max:255',
                    'home_feature_description' => 'required',
                ]);

                return $cms->update($validated);
                break;
            case 'about':
                $this->validate($data, [
                    'about_title' => 'required|max:255',
                    'about_subtitle' => 'required',
                    'about_description' => 'required',
                ]);

                $cms['about_title'] = $data->about_title;
                $cms['about_subtitle'] = $data->about_subtitle;
                $cms['about_description'] = $data->about_description;

                if ($data->hasFile('about_image') && $data->file('about_image')->isValid()) {
                    $data->validate(['about_image' => 'image|mimes:jpeg,png,jpg,svg|max:5120']);
                    $url = uploadFileToPublic('about_image', $data->about_image);
                    $cms['about_image'] = $url;
                }

                return $cms->save();
                break;
            case 'plan':
                $validated = $this->validate($data, [
                    'pricing_plan_title' => 'required|max:255',
                    'pricing_plan_description' => 'required|max:255',
                ]);

                return $cms->update($validated);

                break;
            case 'contact':
                $validated = $this->validate($data, [
                    'contact_title' => 'required|max:255',
                    'contact_subtitle' => 'required|max:255',
                ]);

                return $cms->update($validated);
            case 'testimonial':
                $validated = $this->validate($data, [
                    'testimonial_title' => 'required|max:255',
                    'testimonial_subtitle' => 'required|max:255',
                    'testimonial_description' => 'required',
                ]);

                return $cms->update($validated);
            case 'faq':
                $validated = $this->validate($data, [
                    'faq_title' => 'required|max:255',
                    'faq_subtitle' => 'required|max:255',
                    'faq_description' => 'required',
                ]);

                return $cms->update($validated);
            case 'privacy':
                $validated = $this->validate($data, [
                    'privacy_description' => 'required',
                ]);

                return $cms->update($validated);
            case 'terms':
                $validated = $this->validate($data, [
                    'terms_description' => 'required',
                ]);

                return $cms->update($validated);
                break;

            default:
                // code...
                break;
        }
    }

    public function getCurrencyData()
    {
        $data['currencies'] = Currency::all();
        $path = base_path('resources/json/currency.json');
        $data['currencyInfos'] = json_decode(file_get_contents($path), true);
        $data['defaultCurrency'] = Currency::where('code', config('kodebazar.currency'))->first();

        return $data;
    }

    public function storeCurrencyData($request)
    {
        $request->validate([
            'name' => 'required|unique:currencies,name',
            'code' => 'required',
            'symbol' => 'required',
            'symbol_position' => 'required',
        ]);

        Currency::create([
            'name' => $request->name,
            'code' => $request->code,
            'symbol' => $request->symbol,
            'symbol_position' => $request->symbol_position,
            'status' => $request->status ? 1 : 0,
        ]);
    }

    public function updateCurrencyData($request, $currency)
    {
        $request->validate([
            'name' => "required|unique:currencies,name,$currency->id",
            'code' => 'required',
            'symbol' => 'required',
            'symbol_position' => 'required',
        ]);

        $currency->update([
            'name' => $request->name,
            'code' => $request->code,
            'symbol' => $request->symbol,
            'symbol_position' => $request->symbol_position,
            'status' => $request->status ? 1 : 0,
        ]);
    }

    public function deleteCurrencyData($currency)
    {
        $currency->delete();
    }

    public function statusUpdateCurrencyData($currency)
    {
        if ($currency->status) {
            $currency->update(['status' => 0]);
        } else {
            $currency->update(['status' => 1]);
        }
    }

    public function setDefaultCurrency($currency)
    {
        checkSetEnv('APP_CURRENCY', $currency->code);
        checkSetEnv('APP_CURRENCY_SYMBOL', $currency->symbol);
        checkSetEnv('APP_CURRENCY_SYMBOL_POSITION', $currency->symbol_position);
    }

    public function getSmsSetting()
    {
        $data['twilio_secret'] = config('kodebazar.twilio_secret');
        $data['twilio_token'] = config('kodebazar.twilio_token');
        $data['twilio_from'] = config('kodebazar.twilio_from');
        $data['twilio_active'] = config('kodebazar.twilio_active');

        $data['vonage_key'] = config('kodebazar.vonage_key');
        $data['vonage_secret'] = config('kodebazar.vonage_secret');
        $data['vonage_from_name'] = config('kodebazar.vonage_from_name');
        $data['vonage_active'] = config('kodebazar.vonage_active');

        return $data;
    }

    public function updateSmsSetting($request)
    {
        if ($request->provider == 'twilio') {
            $this->validate($request, [
                'twilio_secret' => 'required',
                'twilio_token' => 'required',
                'twilio_from' => 'required',
            ]);

            checkSetEnv('TWILIO_SID', $request->twilio_secret);
            checkSetEnv('TWILIO_TOKEN', $request->twilio_token);
            setEnv('TWILIO_FROM', $request->twilio_from);
            setEnv('TWILIO_ACTIVE', $request->twilio_active ? 'true' : 'false');
        } else {
            $this->validate($request, [
                'vonage_key' => 'required',
                'vonage_secret' => 'required',
                'vonage_from_name' => 'required',
            ]);

            checkSetEnv('VONAGE_KEY', $request->vonage_key);
            checkSetEnv('VONAGE_SECRET', $request->vonage_secret);
            checkSetEnv('VONAGE_FROM_NAME', $request->vonage_from_name);
            setEnv('VONAGE_ACTIVE', $request->vonage_active ? 'true' : 'false');
        }

        return true;
    }
}
