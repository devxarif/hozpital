<?php

namespace App\Services\Admin\Setting\System;

class UpdateSystemSettingDataService
{
    public function execute(object $request)
    {
        $request->validate([
            'rows_per_page' => 'required',
            'start_day_of_week' => 'required',
            'default_language' => 'required',
            'timezone' => 'required',
            'date_format' => 'required',
            'time_format' => 'required',
            'decimal_places' => 'required'
        ]);

        checkSetConfig('kodebazar.rows_per_page', $request->rows_per_page);
        checkSetConfig('kodebazar.start_day_of_week', $request->start_day_of_week);
        checkSetConfig('kodebazar.default_language', $request->default_language);
        checkSetConfig('app.timezone', $request->timezone);
        checkSetConfig('kodebazar.date_format', $request->date_format);
        checkSetConfig('kodebazar.time_format', $request->time_format);
        checkSetConfig('kodebazar.decimal_places', $request->decimal_places);

        // Saving decimal and thousand separator
        $thousand_separator = $request->thousand_separator;
        $decimal_separator = $request->decimal_separator;

        if (!$thousand_separator) {
            checkSetConfig('kodebazar.thousand_separator', '');
        }elseif ($thousand_separator == 1) {
            checkSetConfig('kodebazar.thousand_separator', ' ');
        }else{
            checkSetConfig('kodebazar.thousand_separator', $thousand_separator );
        }

        if (!$decimal_separator) {
            checkSetConfig('kodebazar.decimal_separator', '');
        }elseif ($decimal_separator == 1) {
            checkSetConfig('kodebazar.decimal_separator', ' ');
        }else{
            checkSetConfig('kodebazar.decimal_separator', $decimal_separator );
        }

        return true;
    }
}
