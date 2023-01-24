<?php

namespace App\Http\Controllers\Admin;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Holiday;
use App\Models\Organization;
use Illuminate\Http\Request;
use App\Models\HolidayRequest;
use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HolidaySaveRequest;

class HolidayController extends Controller
{
    public function index()
    {
        $holidays = Holiday::oldest('start')->get()->transform(function ($date) {
            $date->format_start_date = formatTime($date->start, 'D d M');
            $date->format_end_date = formatTime($date->end, 'D d M');
            return $date;
        });

        return inertia('Admin/Holiday/Index', [
            'holidays' => $holidays,
        ]);
    }

    public function store(HolidaySaveRequest $request)
    {
        Holiday::create([
            'title' => $request->title,
            'start' => $request->start,
            'end' => $request->end,
            'days' => diffBetweenDays($request->start, $request->end),
            'color' => $request->color,
        ]);

        $this->flashSuccess('success', 'Holiday created successfully!');
        return back();
    }

    public function update(HolidaySaveRequest $request, Holiday $holiday)
    {
        $holiday->update([
            'title' => $request->title ?? $holiday->title,
            'start' => $request->start ?? $holiday->start,
            'end' => $request->end ?? $holiday->end,
            'days' => diffBetweenDays($request->start ?? $holiday->start, $request->end ?? $holiday->end),
            'color' => $request->color ?? $holiday->color,
        ]);

        if ($request->type != 'api') {
            $this->flashSuccess('success', 'Holiday updated successfully!');
            return back();
        }
    }

    public function destroy(Holiday $holiday)
    {
        $holiday->delete();

        $this->flashSuccess('success', 'Holiday deleted successfully!');
        return back();
    }
}
