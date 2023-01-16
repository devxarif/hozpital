<?php

namespace App\Services\Admin\LeaveType;

use App\Models\LeaveType;

class UpdateLeaveTypeService
{
    public function execute(object $request, object $leave_type): LeaveType
    {
        // $is_changed_leave_balance = $leave_type->balance != $request->balance;

        $leave_type->update([
            'name' => $request->name,
            'color' => $request->color,
            'balance' => $request->balance,
            'auto_approve' => $request->auto_approve ? 1 : 0,
            'status' => $request->status ? 1 : 0,
            'description' => $request->description,
        ]);

        // Update leave balance for the employee
        // if ($is_changed_leave_balance) {
        //     $leave_type->leaveBalances()->update([
        //         'total_days' => $request->balance,
        //     ]);
        // }

        return $leave_type;
    }
}
