<?php

namespace App\Http\Controllers\Admin;

use App\Models\Event;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EventSaveRequest;
use App\Services\Admin\Event\CreateEventService;
use App\Services\Admin\Event\UpdateEventService;

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
        (new CreateEventService())->execute($request);

        $this->flashSuccess('success', 'Event created successfully!');
        return back();
    }

    public function update(EventSaveRequest $request, Event $event)
    {
        (new UpdateEventService())->execute($request,$event);

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
