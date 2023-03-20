<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $appends = ['app_name', 'app_default_language', 'app_timezone', 'app_currency', 'app_currency_symbol', 'app_currency_symbol_position'];

    public function getAppNameAttribute()
    {
        return config('app.name', 'Hozpital');
    }

    public function getAppDefaultLanguageAttribute()
    {
        return config('kodebazar.default_language', 'en');
    }

    public function getAppTimezoneAttribute()
    {
        return config('kodebazar.timezone', 'UTC');
    }

    public function getAppCurrencyAttribute()
    {
        return config('kodebazar.currency', 'USD');
    }

    public function getAppCurrencySymbolAttribute()
    {
        return config('kodebazar.currency_symbol', '$');
    }

    public function getAppCurrencySymbolPositionAttribute()
    {
        return config('kodebazar.currency_symbol_position', 'left');
    }

    public function getAppDarkLogoAttribute($value)
    {
        if (is_null($value)) {
            return asset('assets/img/hozpital_red_logo.svg');
        }

        return asset($value);
    }

    public function getAppLightLogoAttribute($value)
    {
        if (is_null($value)) {
            return asset('assets/img/hozpital_logo.svg');
        }

        return asset($value);
    }

    public function getAppFaviconAttribute($value)
    {
        if (is_null($value)) {
            return asset('assets/img/favicon.png');
        }

        return asset($value);
    }
}
