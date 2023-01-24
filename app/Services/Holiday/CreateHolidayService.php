<?php

namespace App\Services\Admin\Holiday;

use App\Models\Holiday;

class CreateHolidayService
{
    public function execute(object $request): Holiday
    {
        $holiday = Holiday::create([
            'title' => $request->title,
            'start' => $request->start,
            'end' => $request->end,
            'days' => diffBetweenDays($request->start, $request->end),
            'color' => $request->color,
        ]);

        return $holiday;
    }
}
