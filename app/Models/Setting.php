<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Setting extends Model
{
    use HasFactory;

    protected $appends = ['app_name', 'app_default_language', 'app_timezone', 'app_currency', 'app_currency_symbol',
    'app_currency_symbol_position', 'rows_per_page', 'default_language', 'date_format', 'time_format', 'thousand_separator', 'decimal_separator', 'decimal_places','start_day_of_week'];

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
            return asset('assets/img/favicon.svg');
        }

        return asset($value);
    }

    public function getRowsPerPageAttribute()
    {
        return config('kodebazar.rows_per_page', 20);
    }

    public function getDefaultLanguageAttribute()
    {
        return config('kodebazar.default_language', 'en');
    }

    public function getDateFormatAttribute()
    {
        return config('kodebazar.date_format', 'd F, Y');
    }

    public function getTimeFormatAttribute()
    {
        return config('kodebazar.time_format', 'H:i');
    }

    public function getThousandSeparatorAttribute()
    {
        return config('kodebazar.thousand_separator', '');
    }

    public function getDecimalSeparatorAttribute()
    {
        return config('kodebazar.decimal_separator', '');
    }

    public function getDecimalPlacesAttribute()
    {
        return config('kodebazar.decimal_places', 0);
    }

    public function getStartDayOfWeekAttribute()
    {
        return config('kodebazar.start_day_of_week', 1);
    }
}


// 'rows_per_page' => 30,
// 'start_day_of_week' => 1,
// 'default_language' => 'bn',
// 'date_format' => 'd F, Y',
// 'time_format' => 'h:i A',
// 'thousand_separator' => ' ',
// 'decimal_separator' => ' ',
// 'decimal_places' => 2,
