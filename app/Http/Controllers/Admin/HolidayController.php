<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HolidaySaveRequest;
use App\Models\Holiday;
use App\Services\Admin\Holiday\CreateHolidayService;
use App\Services\Admin\Holiday\UpdateHolidayService;

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
        (new CreateHolidayService)->execute($request);

        $this->flashSuccess('success', 'Holiday created successfully!');

        return back();
    }

    public function update(HolidaySaveRequest $request, Holiday $holiday)
    {
        (new UpdateHolidayService)->execute($request, $holiday);

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
