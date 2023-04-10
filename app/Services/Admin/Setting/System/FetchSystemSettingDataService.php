<?php

namespace App\Services\Admin\Setting\System;

use App\Models\Language;
use Illuminate\Support\Facades\Artisan;
use Illuminate\Support\Facades\DB;

class FetchSystemSettingDataService
{
    public function execute()
    {
        // Fetching decimal and thousand separator
        $thousand_separator = config('kodebazar.thousand_separator');
        $decimal_separator = config('kodebazar.decimal_separator');

        if ($thousand_separator == '') {
            $thousand_separator = 0;
        }else if ($thousand_separator == ' ') {
            $thousand_separator = 1;
        }

        if ($decimal_separator == '') {
            $decimal_separator = 0;
        }else if ($decimal_separator == ' ') {
            $decimal_separator = 1;
        }

        return [
            'rows_per_page' => config('kodebazar.rows_per_page'),
            'start_day_of_week' => config('kodebazar.start_day_of_week'),
            'default_language' => config('kodebazar.default_language'),
            'default_currency' => config('kodebazar.default_currency'),
            'currency_symbol' => config('kodebazar.currency_symbol'),
            'timezone' => config('app.timezone'),
            'date_format' => config('kodebazar.date_format'),
            'time_format' => config('kodebazar.time_format'),
            'thousand_separator' => $thousand_separator,
            'decimal_separator' => $decimal_separator,
            'decimal_places' => config('kodebazar.decimal_places'),

            'languages' => Language::all(['id', 'name', 'language_code']),
            'currencies' => $this->currencies(),
            'all_timezones' => DB::table('timezones')->get(),
            'all_date_formats' => $this->date_formats(),
            'all_rows_per_page' => $this->rows_per_page(),
            'week_days' => $this->week_days(),
            'decimal_places_options' => $this->decimal_places_options(),
            'thousand_separator_options' => $this->thousand_separator_options(),
            'decimal_separator_options' => $this->decimal_separator_options(),
        ];
    }

    public function currencies(){
        return [
            "AED","AFN","ALL","AMD","ANG","AOA","ARS","AUD","AWG","AZN","BAM","BAM","BDT","BGN","BHD","BIF","BMD","BND","BOB","BOV","BRL","BSD","BTN","BWP","BYN","BYR","BZD","CAD","CDF","CHE","CHF","CHW","CLF","CLP","CNY","COP","COU","CRC","CUC","CUP","CVE","CZK","DJF","DKK","DOP","DZD","EGP","ERN","ETB","EUR","FJD","FKP","GBP","GEL","GHS","GIP","GMD","GNF","GTQ","GYD","HKD","HNL","HRK","HTG","HUF","IDR","ILS","INR","IQD","IRR","ISK","JMD","JOD","JPY","KES","KGS","KHR","KMF","KPW","KRW","KWD","KYD","KZT","LAK","LBP","LKR","LRD","LSL","LYD","MAD","MDL","MGA","MKD","MMK","MNT","MOP","MRO","MUR","MVR","MWK","MXN","MXV","MYR","MZN","NAD","NGN","NIO","NOK","NPR","NZD","OMR","PAB","PEN","PGK","PHP","PKR","PLN","PYG","QAR","RON","RSD","RUB","RWF","SAR","SBD","SCR","SDG","SEK","SGD","SHP","SLL","SOS","SRD","SSP","STD","SVC","SYP","SZL","THB","TJS","TMT","TND","TOP","TRY","TTD","TWD","TZS","UAH","UGX","USD","USN","UYI","UYU","UZS","VEF","VND","VUV","WST","XAF","XAG","XAU","XBA","XBB","XBC","XBD","XCD","XDR","XOF","XPD","XPF","XPT","XSU","XTS","XUA","XXX","YER","ZAR","ZMW","ZWL"
        ];
    }

    public function week_days(){
        return [
            [ "label" => "Sunday", "value" => 0],
            [ "label" => "Monday", "value" => 1],
            [ "label" => "Tuesday", "value" => 2],
            [ "label" => "Wednesday", "value" => 3],
            [ "label" => "Thursday", "value" => 4],
            [ "label" => "Friday", "value" => 5],
            [ "label" => "Saturday", "value" => 6],
        ];
    }

    public function rows_per_page(){
        return [
            ['label' => '10', 'value' => 10],
            ['label' => '20', 'value' => 20],
            ['label' => '30', 'value' => 30],
            ['label' => '40', 'value' => 40],
            ['label' => '50', 'value' => 50],
            ['label' => '100', 'value' => 100],
        ];
    }

    public function date_formats(){
        return [
            ['label' => "m/d/Y (".formatTime(now(), 'm/d/Y').')', 'value' => 'm/d/Y'],
            ['label' => "d/m/Y (".formatTime(now(), 'd/m/Y').')', 'value' => 'd/m/Y'],
            ['label' => "Y/m/d (".formatTime(now(), 'Y/m/d').')', 'value' => 'Y/m/d'],
            ['label' => "Y/d/m (".formatTime(now(), 'Y/d/m').')', 'value' => 'Y/d/m'],
            ['label' => "m-d-Y (".formatTime(now(), 'm-d-Y').')', 'value' => 'm-d-Y'],
            ['label' => "d-m-Y (".formatTime(now(), 'd-m-Y').')', 'value' => 'd-m-Y'],
            ['label' => "Y-m-d (".formatTime(now(), 'Y-m-d').')', 'value' => 'Y-m-d'],
            ['label' => "Y-d-m (".formatTime(now(), 'Y-d-m').')', 'value' => 'Y-d-m'],
            ['label' => "d M, Y (".formatTime(now(), 'd M, Y').')', 'value' => 'd M, Y'],
            ['label' => "M d, Y (".formatTime(now(), 'M d, Y').')', 'value' => 'M d, Y'],
            ['label' => "Y M, d (".formatTime(now(), 'Y M, d').')', 'value' => 'Y M, d'],
            ['label' => "d F, Y (".formatTime(now(), 'd F, Y').')', 'value' => 'd F, Y'],
            ['label' => "Y F, d (".formatTime(now(), 'Y F, d').')', 'value' => 'Y F, d'],
        ];
    }

    public function decimal_places_options(){
        return [
            ['label' => 'No Decimal (1)', 'value' => 0],
            ['label' => '2 Places (1.00)', 'value' => 2],
            ['label' => '3 Places (1.000)', 'value' => 3],
            ['label' => '4 Places (1.0000)', 'value' => 4],
            ['label' => '5 Places (1.00000)', 'value' => 5],
            ['label' => '6 Places (1.000000)', 'value' => 6],
            ['label' => '7 Places (1.0000000)', 'value' => 7],
            ['label' => '8 Places (1.00000000)', 'value' => 8],
        ];
    }

    public function thousand_separator_options(){
        return [
            ['label' => 'No Separator (1234)', 'value' => 0],
            ['label' => 'Comma (1,234)', 'value' => ','],
            ['label' => 'Dot (1.234)', 'value' => '.'],
            ['label' => 'Space (1 234)', 'value' => 1],
            ['label' => 'Apostrophe (1\'234)', 'value' => '\''],
        ];
    }

    public function decimal_separator_options(){
        return [
            ['label' => 'No Separator (1234)', 'value' => 0],
            ['label' => 'Comma (1,234)', 'value' => ','],
            ['label' => 'Dot (1.234)', 'value' => '.'],
            ['label' => 'Space (1 234)', 'value' => 1],
            ['label' => 'Apostrophe (1\'234)', 'value' => '\''],
        ];
    }
}
