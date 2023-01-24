<?php

namespace App\Services\Admin\Event;

use App\Models\Event;

class UpdateEventService
{
    public function execute(object $request, object $event): Event
    {
        $event->update([
            'title' => $request->title ?? $event->title,
            'start' => $request->start ?? $event->start,
            'end' => $request->end ?? $event->end,
            'days' => diffBetweenDays($request->start ?? $event->start, $request->end ?? $event->end),
            'color' => $request->color ?? $event->color,
        ]);

        return $event;
    }
}
