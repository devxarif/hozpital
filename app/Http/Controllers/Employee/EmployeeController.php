<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use App\Models\Employee;
use App\Models\Holiday;
use App\Models\HolidayRequest;
use App\Models\Organization;
use App\Models\Team;
use App\Notifications\Organization\NewHolidayRequest;
use Illuminate\Http\Request;

class EmployeeController extends Controller
{
    public function holidays()
    {
        $user = getOrganizationUserByEmployeeUser(currentUserId());
        $organization = Organization::where('user_id', $user->id)->firstOrFail();
        $holidays = Holiday::where('organization_id', $organization->id)
            ->oldest('start')
            ->get()
            ->transform(function ($date) {
                $date->format_start_date = formatTime($date->start, 'D d M');
                $date->format_end_date = formatTime($date->end, 'D d M');

                return $date;
            });

        return inertia('Employee/Holidays', [
            'user' => $user,
            'organization' => $organization,
            'holidays' => $holidays,
        ]);
    }

    public function storeHolidayRequest(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'start' => 'required',
            'end' => 'required',
            'note' => 'required',
        ]);

        $employee = currentEmployee();

        HolidayRequest::create([
            'title' => $request->title,
            'start' => $request->start,
            'end' => $request->end,
            'days' => diffBetweenDays($request->start, $request->end),
            'note' => $request->note,
            'employee_id' => $employee->id,
            'organization_id' => $employee->organization_id,
        ]);

        // Notification for organization
        $user = $employee->organization->user ?? null;
        isset($user) ? $user->notify(new NewHolidayRequest($employee->organization_id)) : '';

        session()->flash('success', 'Holiday request sent successfully!');

        return back();
    }

    public function teams()
    {
        $organization = currentUser()->employee;
        $teams = Team::where('organization_id', $organization->organization_id)->get(['id', 'name', 'slug']);
        $employees = Employee::with('user:id,name,email,avatar', 'team:id,name')->where('organization_id', $organization->organization_id)->get();

        return inertia('Employee/Teams', [
            'teams' => $teams,
            'employees' => $employees,
        ]);
    }

    public function teamEmployees(Request $request)
    {
        if ($request->team && $request->team != 'all') {
            $team = Team::whereSlug($request->team)->firstOrFail();
            $employees = $team->employees()->with('user:id,name,email,avatar', 'team:id,name')->get();
        } else {
            $employees = Employee::with('user:id,name,email,avatar', 'team:id,name')->where('organization_id', currentOrganization()->id)->get();
        }

        return [
            'employees' => $employees,
        ];
    }
}
