<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Leave\LeaveTypeCreateRequest;
use App\Http\Requests\Admin\Leave\LeaveTypeUpdateRequest;
use App\Models\LeaveBalance;
use App\Models\LeaveType;
use App\Services\Admin\LeaveType\CreateLeaveTypeService;
use App\Services\Admin\LeaveType\UpdateLeaveTypeService;
use App\Traits\HasLeaveBalance;
use App\Traits\HasSubscription;
use Illuminate\Http\Request;

class LeaveTypeController extends Controller
{
    use HasSubscription, HasLeaveBalance;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $query = LeaveType::query();

        if($request->has('keyword') && $request->filled('keyword')) {
            $query->whereLike(['name'], $request->keyword);
        }

        $leave_types = $query->latest()->paginate(config('kodebazar.rows_per_page'))->withQueryString();

        return inertia('Admin/LeaveType/Index', [
            'leave_types' => $leave_types,
            'filter' => $request,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function store(LeaveTypeCreateRequest $request)
    {
        (new CreateLeaveTypeService)->execute($request);

        // Create leave balance for the employee
        // $this->attachLeaveTypeToAllEmployees($organization, $leave_type);

        $this->flashSuccess('Leave type created successfully!');

        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function update(LeaveTypeUpdateRequest $request, LeaveType $leaveType)
    {
        (new UpdateLeaveTypeService)->execute($request, $leaveType);

        $this->flashSuccess('Leave type updated successfully!');

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @return \Illuminate\Http\Response
     */
    public function destroy(LeaveType $leaveType)
    {
        $leaveType->delete();

        $this->flashSuccess('Leave type deleted successfully!');

        return back();
    }

    public function leaveTypeBalance(Request $request)
    {
        $leave_balance = LeaveBalance::where('employee_id', $request->employee_id)
            ->where('leave_type_id', $request->leave_type_id)
            ->first();

        return $leave_balance;
    }
}
