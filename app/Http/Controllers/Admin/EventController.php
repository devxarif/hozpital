<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EventSaveRequest;

class EventController extends Controller
{
    public function index()
    {
        $events = Event::latest('start')->get()->transform(function ($date) {
            $date->format_start_date = formatTime($date->start, 'D d M Y');
            $date->format_end_date = formatTime($date->end, 'D d M Y');
            return $date;
        });

        return inertia('Admin/Event/Index', [
            'events' => $events,
        ]);
    }

    public function store(EventSaveRequest $request)
    {
        Event::create([
            'title' => $request->title,
            'start' => $request->start,
            'end' => $request->end,
            'days' => diffBetweenDays($request->start, $request->end),
            'color' => $request->color,
        ]);

        $this->flashSuccess('success', 'Event created successfully!');
        return back();
    }

    public function update(EventSaveRequest $request, Event $event)
    {
        $event->update([
            'title' => $request->title ?? $event->title,
            'start' => $request->start ?? $event->start,
            'end' => $request->end ?? $event->end,
            'days' => diffBetweenDays($request->start ?? $event->start, $request->end ?? $event->end),
            'color' => $request->color ?? $event->color,
        ]);

        if ($request->type != 'api') {
            $this->flashSuccess('success', 'Event updated successfully!');
            return back();
        }
    }

    public function destroy(Event $event)
    {
        $event->delete();

        $this->flashSuccess('success', 'Event deleted successfully!');
        return back();
    }
}
