<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use App\Models\Order;
use App\Models\Organization;
use App\Models\Country;
use App\Http\Controllers\Controller;

class OrganizationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $search = request('search') ?? '';
        $country = request('country') ?? '';

        $companies = Organization::with('country')
        ->where(function ($query) use ($search) {
            $query->where('organization_name', 'LIKE', '%' . $search . '%')
                ->orWhere('organization_email', 'LIKE', '%' . $search . '%');
        })
        ->when($country, function ($query, $country) {
            $query->where('country_id', $country);
        })
        ->latest()
        ->paginate(10)
        ->withQueryString()
        // ->get()
        ->through(fn ($organization) => [
            'id' => $organization->id,
            'name' => $search ? preg_replace('/(' . $search . ')/i', "<b class='bg-warning'>$1</b>", $organization->organization_name) : $organization->organization_name,
            'email' => $search ? preg_replace('/(' . $search . ')/i', "<b class='bg-warning'>$1</b>", $organization->organization_email) : $organization->organization_email,
            'organization_logo' => $organization->organization_logo,
            'organization_logo_url' => $organization->organization_logo_url,
            'country' => $organization->country->name ?? '',
        ]);

        $countries = Country::all(['id', 'name', 'slug']);

        return inertia('Admin/Organization/Index', [
            'companies' => $companies,
            'countries' => $countries,
            'filters' => [
                'search' => $search,
                'country' => $country ?? '',
            ],
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Organization $organization)
    {
        $organization->load('country:id,name');

        // Working days
        $working_days = $organization->workingDays;

        // organization summary
        $leave_requests = $organization->leaveRequests;
        $summary = [
            'total_expense' => currencyConversion(Order::where('organization_id', $organization->id)->sum('usd_amount'), 'USD', $organization->currency) ?? 0,
            'total_teams' => $organization->teams()->count(),
            'total_employees' => $organization->employees()->count(),
            'total_holidays' => $organization->holidays()->count(),
            'total_leave_types' => $organization->leaveTypes()->count(),
            'total_rejected_leave_requests' => $leave_requests->where('status','rejected')->count(),
            'total_pending_leave_requests' => $leave_requests->where('status','pending')->count(),
            'total_approved_leave_requests' => $leave_requests->where('status','approved')->count(),
        ];

        // Currently Subscription
       $subscribed_plan = $organization->subscription->load('plan.planFeatures');

        return inertia('Admin/Organization/Show', [
            'user' => $organization,
            'working_days' => $working_days,
            'summary' => $summary,
            'subscribed_plan' => $subscribed_plan,
        ]);
    }

    public function companiesTeams(Organization $organization)
    {
        $teams = $organization->teams;

        return response()->json([
            'success' => true,
            'teams' => $teams,
        ]);
    }

    public function companiesLeaveTypes(User $user)
    {
        $leaveTypes = $user->organization->leaveTypes;

        return response()->json([
            'success' => true,
            'leaveTypes' => $leaveTypes,
        ]);
    }

    public function companiesEmployees(User $user)
    {
        $employeesUsers = $user->organization->employees->load('user');

        return response()->json([
            'success' => true,
            'employeesUsers' => $employeesUsers,
        ]);
    }

    public function companiesWiseEmployees(Organization $organization)
    {
        $employees = $organization->employees->load('user:id,name');

        return response()->json([
            'success' => true,
            'employees' => $employees,
        ]);
    }
}
