<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\HolidaySaveRequest;
use App\Models\Country;
use App\Models\Holiday;
use App\Models\HolidayRequest;
use App\Models\Organization;
use App\Traits\HasCountry;
use Illuminate\Http\Request;

class HolidayController extends Controller
{
    use HasCountry;

    public function index()
    {
        $user = currentUser();
        $organization = Organization::with('country:id,name')->where('user_id', $user->id)->firstOrFail();
        $holidays = Holiday::where('organization_id', $organization->id)->oldest('start')->get()->transform(function ($date) {
            $date->format_start_date = formatTime($date->start, 'D d M');
            $date->format_end_date = formatTime($date->end, 'D d M');

            return $date;
        });

        return inertia('Organization/Holiday/Holidays', [
            'user' => $user,
            'organization' => $organization,
            'holidays' => $holidays,
        ]);
    }

    public function store(HolidaySaveRequest $request)
    {
        Holiday::create([
            'organization_id' => $request->organization_id,
            'title' => $request->title,
            'start' => $request->start,
            'end' => $request->end,
            'days' => diffBetweenDays($request->start, $request->end),
            'color' => '#ff0000',
        ]);

        session()->flash('success', 'Official holiday created successfully!');

        return back();
    }

    public function update(HolidaySaveRequest $request, Holiday $holiday)
    {
        $holiday->update([
            'title' => $request->title,
            'start' => $request->start,
            'end' => $request->end,
            'days' => diffBetweenDays($request->start, $request->end),
            'color' => '#ff0000',
        ]);

        session()->flash('success', 'Official holiday updated successfully!');

        return back();
    }

    public function destroy(Holiday $holiday)
    {
        $holiday->delete();

        session()->flash('success', 'Holiday deleted successfully!');

        return back();
    }

    public function destroyAllHolidays()
    {
        currentOrganization()->holidays()->delete();

        session()->flash('success', 'All holidays deleted successfully!');

        return back();
    }

    public function importHolidays(Request $request)
    {
        $request->validate([
            'country' => 'required|exists:countries,id',
        ]);

        $organization = currentOrganization();
        $country = Country::findOrFail($request->country);
        $code = $this->getCountryCode($country->code);

        if ($request->type == 'add') {
            importHolidays($organization->id, $code);
        } else {
            $organization->holidays()->delete();
            importHolidays($organization->id, $code);
        }

        session()->flash('success', 'Holidays imported successfully!');

        return back();
    }

    public function requestedHolidays()
    {
        $organization = getOrganization(currentUserId());
        $holidays = HolidayRequest::where('organization_id', $organization->id)
            ->with('employee.user')
            ->latest()
            ->paginate(10);

        return inertia('Organization/Holiday/HolidayRequest', [
            'holidays' => $holidays,
            'organization' => $organization->load('country:id,name'),
            'user' => $organization->user,
        ]);
    }

    public function requestedHolidaysAccept(Request $request)
    {
        $request_holiday = HolidayRequest::findOrFail($request->id);
        Holiday::create([
            'organization_id' => $request_holiday->organization_id,
            'title' => $request_holiday->title,
            'start' => $request_holiday->start,
            'end' => $request_holiday->end,
            'days' => diffBetweenDays($request_holiday->start, $request_holiday->end),
            'color' => '#ff0000',
        ]);

        $request_holiday->delete();

        session()->flash('success', 'Holiday request accepted successfully!');

        return back();
    }

    public function requestedHolidaysReject(HolidayRequest $holiday)
    {
        $holiday->delete();

        session()->flash('success', 'Holiday request rejected successfully!');

        return back();
    }
}
