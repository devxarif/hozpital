<?php

namespace App\Services\Admin\Holiday;

use App\Models\Holiday;

class UpdateHolidayService
{
    public function execute(object $request, object $holiday): Holiday
    {
        $holiday->update([
            'title' => $request->title ?? $holiday->title,
            'start' => $request->start ?? $holiday->start,
            'end' => $request->end ?? $holiday->end,
            'days' => diffBetweenDays($request->start ?? $holiday->start, $request->end ?? $holiday->end),
            'color' => $request->color ?? $holiday->color,
        ]);

        return $holiday;
    }
}
