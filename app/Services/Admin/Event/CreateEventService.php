<?php

namespace App\Services\Admin\Event;

use App\Models\Event;

class CreateEventService
{
    public function execute(object $request): Event
    {
        $event = Event::create([
            'title' => $request->title,
            'start' => $request->start,
            'end' => $request->end,
            'days' => diffBetweenDays($request->start, $request->end),
            'color' => $request->color,
        ]);

        return $event;
    }
}
