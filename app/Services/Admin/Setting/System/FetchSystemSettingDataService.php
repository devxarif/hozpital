<?php

namespace App\Services\Admin\Setting\System;

use App\Models\Language;
use Illuminate\Support\Facades\DB;

class FetchSystemSettingDataService
{
    public function execute(): array
    {
        return [
            'rows_per_page' => config('kodebazar.rows_per_page'),
            'start_day_of_week' => config('kodebazar.start_day_of_week'),
            'default_language' => config('kodebazar.default_language'),
            'timezone' => config('app.timezone'),
            'date_format' => config('kodebazar.date_format'),
            'time_format' => config('kodebazar.time_format'),
            'currency_thousand_separator' => config('kodebazar.currency_thousand_separator'),

            'languages' => Language::all(['id', 'name', 'language_code']),
            'all_timezones' => DB::table('timezones')->get(),
            'all_date_formats' => $this->date_formats(),
            'all_rows_per_page' => $this->rows_per_page(),
            'week_days' => $this->week_days(),
        ];
    }

    public function week_days(){
        return [
            [
                "label" => "Sunday",
                "value" => 0
            ],
            [
                "label" => "Monday",
                "value" => 1
            ],
            [
                "label" => "Tuesday",
                "value" => 2
            ],
            [
                "label" => "Wednesday",
                "value" => 3
            ],
            [
                "label" => "Thursday",
                "value" => 4
            ],
            [
                "label" => "Friday",
                "value" => 5
            ],
            [
                "label" => "Saturday",
                "value" => 6
            ],
        ];
    }

    public function rows_per_page(){
        return [
            [
                'label' => '10',
                'value' => 10,
            ],
            [
                'label' => '20',
                'value' => 20,
            ],
            [
                'label' => '30',
                'value' => 30,
            ],
            [
                'label' => '40',
                'value' => 40,
            ],
            [
                'label' => '50',
                'value' => 50,
            ],
            [
                'label' => '100',
                'value' => 100,
            ],
        ];
    }

    public function date_formats(){
        return [
            [
                'label' => "m/d/Y (".formatTime(now(), 'm/d/Y').')',
                'value' => 'm/d/Y',
            ],
            [
                'label' => "d/m/Y (".formatTime(now(), 'd/m/Y').')',
                'value' => 'd/m/Y',
            ],
            [
                'label' => "Y/m/d (".formatTime(now(), 'Y/m/d').')',
                'value' => 'Y/m/d',
            ],
            [
                'label' => "Y/d/m (".formatTime(now(), 'Y/d/m').')',
                'value' => 'Y/d/m',
            ],
            [
                'label' => "m-d-Y (".formatTime(now(), 'm-d-Y').')',
                'value' => 'm-d-Y',
            ],
            [
                'label' => "d-m-Y (".formatTime(now(), 'd-m-Y').')',
                'value' => 'd-m-Y',
            ],
            [
                'label' => "Y-m-d (".formatTime(now(), 'Y-m-d').')',
                'value' => 'Y-m-d',
            ],
            [
                'label' => "Y-d-m (".formatTime(now(), 'Y-d-m').')',
                'value' => 'Y-d-m',
            ],
            [
                'label' => "d M, Y (".formatTime(now(), 'd M, Y').')',
                'value' => 'd M, Y',
            ],
            [
                'label' => "M d, Y (".formatTime(now(), 'M d, Y').')',
                'value' => 'M d, Y',
            ],
            [
                'label' => "Y M, d (".formatTime(now(), 'Y M, d').')',
                'value' => 'Y M, d',
            ],
            [
                'label' => "d F, Y (".formatTime(now(), 'd F, Y').')',
                'value' => 'd F, Y',
            ],
            [
                'label' => "Y F, d (".formatTime(now(), 'Y F, d').')',
                'value' => 'Y F, d',
            ],
        ];
    }
}
