<?php

namespace App\Http\Controllers\Organization;

use App\Models\Team;
use App\Models\Employee;
use App\Models\LeaveType;
use App\Models\LeaveBalance;
use App\Models\LeaveRequest;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Notifications\Employee\PendingLeaveRequest;
use App\Notifications\Employee\ApprovedLeaveRequest;
use App\Notifications\Employee\RejectedLeaveRequest;
use App\Http\Requests\Organization\LeaveRequestSaveRequest;

class LeaveRequestController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $status = request('status') ?? '';
        $leave_type = request('leave_type') ?? '';
        $id = request('id') ?? '';
        $organization = currentOrganization();

        $leave_requests_query = LeaveRequest::query();
        if ($id) {$leave_requests_query->where('id', $id);}

        $leave_requests = $leave_requests_query->with(['employee.user', 'employee.team', 'organization.user', 'leaveType'])
            ->where('organization_id', $organization->id)
            ->when($status, function ($query, $status) {
                $query->where('status', $status);
            })
            ->when($leave_type, function ($query, $leave_type) {
                $query->where('leave_type_id', $leave_type);
            })
            ->latest()
            ->paginate(10);

        $leave_types = LeaveType::where('organization_id', $organization->id)->get(['id', 'name']);
        $teams = Team::where('organization_id', $organization->id)->get(['id', 'name']);

        return inertia('Organization/LeaveRequest/Index', [
            'leaveRequests' => $leave_requests,
            'leaveTypes' => $leave_types,
            'teams' => $teams,
            'filters' => [
                'status' => $status ?? '',
                'leave_type' => $leave_type ?? ''
            ],
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $organization = currentOrganization();
        $leaveTypes = $organization->leaveTypes;
        $employeesUsers = $organization->employees->load('user');

        return inertia('Organization/LeaveRequest/Create', [
            'leaveTypes' => $leaveTypes,
            'employeesUsers' => $employeesUsers,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  LeaveRequestSaveRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LeaveRequestSaveRequest $request)
    {
        $organization = currentOrganization();
        $final_days_count = sumFinalDays($organization->id, $request->start, $request->end) ?? diffBetweenDays($request->start, $request->end);

        $leave_request = LeaveRequest::create([
            'organization_id' => $organization->id,
            'employee_id' => $request->employee_id,
            'leave_type_id' => $request->leave_type_id,
            'start' => $request->start,
            'end' => $request->end,
            'days' => $final_days_count,
            'reason' => $request->reason,
            'status' => $request->status,
        ]);


        if ($request->status == 'approved') {
            $leave_balance = LeaveBalance::where('leave_type_id', $leave_request->leave_type_id)
                ->where('employee_id', $leave_request->employee_id)
                ->first();

            $diffDays = $final_days_count;
            $leave_balance->increment('used_days', $diffDays);
        }

        // Notification and mail sending
        // if ($leave_request->status == 'pending') {
        //     $leave_request->employee->user->notify(new PendingLeaveRequest($leave_request));
        //     $message = "Your leave request has been submitted. Please wait for approval.";
        // } elseif ($leave_request->status == 'approved') {
        //     $leave_request->employee->user->notify(new ApprovedLeaveRequest($leave_request));
        //     $message = "Your leave request has been approved";
        // } elseif ($leave_request->status == 'rejected') {
        //     $leave_request->employee->user->notify(new RejectedLeaveRequest($leave_request));
        //     $message = "Your leave request has been rejected";
        // }

        // Sms sending
        // $to = $leave_request->employee->phone;
        // sendSms('twilio', $to, $message);
        // sendSms('vonage', $to, $message);

        session()->flash('success', 'Leave request created successfully!');
        return redirect_to('organization.leaveRequests.index');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(LeaveRequest $leaveRequest)
    {
        $organization_id = $leaveRequest->organization_id;
        $leaveTypes = LeaveType::where('organization_id', $organization_id)->get(['id', 'name']);
        $employeesUsers = Employee::with('user')->where('organization_id', $organization_id)->get(['id', 'user_id']);

        return inertia('Organization/LeaveRequest/Edit', [
            'leaveRequest' => $leaveRequest,
            'leaveTypes' => $leaveTypes,
            'employeesUsers' => $employeesUsers,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  LeaveRequestSaveRequest  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(LeaveRequestSaveRequest $request, LeaveRequest $leaveRequest)
    {
        $organization = currentOrganization();
        $final_days_count = sumFinalDays($organization->id, $request->start, $request->end) ?? diffBetweenDays($request->start, $request->end);

        $leaveRequest->update([
            'organization_id' => currentOrganization()->id,
            'employee_id' => $request->employee_id,
            'leave_type_id' => $request->leave_type_id,
            'start' => $request->start,
            'end' => $request->end,
            'days' => $final_days_count,
            'reason' => $request->reason,
            'status' => $request->status,
        ]);

        // Notification and mail sending
        // if ($leaveRequest->status == 'pending') {
        //     $leaveRequest->employee->user->notify(new PendingLeaveRequest($leaveRequest));
        //     $message = "Your leave request has been submitted. Please wait for approval.";
        // } elseif ($leaveRequest->status == 'approved') {
        //     $leaveRequest->employee->user->notify(new ApprovedLeaveRequest($leaveRequest));
        //     $message = "Your leave request has been approved";
        // } elseif ($leaveRequest->status == 'rejected') {
        //     $leaveRequest->employee->user->notify(new RejectedLeaveRequest($leaveRequest));
        //     $message = "Your leave request has been rejected";
        // }

        // Sms sending
        // $to = $leaveRequest->employee->phone;
        // sendSms('twilio', $to, $message);
        // sendSms('vonage', $to, $message);

        session()->flash('success', 'Leave request updated successfully!');
        return redirect_to('organization.leaveRequests.index');
    }

    public function statusChange(Request $request)
    {
        $leave_request = LeaveRequest::findOrFail($request->id);

        if ($leave_request->status == 'pending' && $request->status == 'approved') {

            $final_days_count = sumFinalDays($leave_request->organization_id, $leave_request->start, $leave_request->end) ?? diffBetweenDays($leave_request->start, $leave_request->end);

            $leave_balance = LeaveBalance::where('leave_type_id', $leave_request->leave_type_id)
                ->where('employee_id', $leave_request->employee_id)
                ->first();

            $diffDays = $final_days_count;
            $leave_balance->increment('used_days', $diffDays);
        }

        $leave_request->update([
            'status' => $request->status,
        ]);

        // Notification and mail sending
        // if ($request->status == 'approved') {
        //     $leave_request->employee->user->notify(new ApprovedLeaveRequest($leave_request));
        //     $message = "Your leave request has been approved";
        // } elseif ($request->status == 'rejected') {
        //     $leave_request->employee->user->notify(new RejectedLeaveRequest($leave_request));
        //     $message = "Your leave request has been rejected";
        // }

        // Sms sending
        // $to = $leave_request->employee->phone;
        // sendSms('twilio', $to, $message);
        // sendSms('vonage', $to, $message);

        $message = 'Leave Request ' . $request->status . ' successfully';
        session()->flash('success', $message);
        return back();
    }
}
