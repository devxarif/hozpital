<?php

namespace App\Traits;

use App\Models\LeaveBalance;
use App\Models\User;

trait HasLeaveBalance
{
    public function employeeLeaveBalanceCreate($user_id, $employee_id)
    {
        $user = User::find($user_id);
        $leave_types = $user->leaveTypes;

        foreach ($leave_types as $leave_type) {
            LeaveBalance::create([
                'user_id' => $user_id,
                'leave_type_id' => $leave_type->id,
                'total_days' => $leave_type->balance,
                'used_days' => 0,
            ]);
        }

        return true;
    }

    public function attachLeaveTypeToAllEmployees($company, $leave_type)
    {
        $users = User::where('role', '!=', 'patient')->get();

        foreach ($users as $user) {
            LeaveBalance::create([
                'user_id' => $user->id,
                'leave_type_id' => $leave_type->id,
                'total_days' => $leave_type->balance,
                'used_days' => 0,
            ]);
        }

        return true;
    }
}
