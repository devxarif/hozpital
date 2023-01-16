<?php

namespace App\Services\Admin\LeaveType;

use App\Models\LeaveType;

class CreateLeaveTypeService
{
    public function execute(object $request): LeaveType
    {
        $leave_type = LeaveType::create([
            'name' => $request->name,
            'color' => $request->color,
            'balance' => $request->balance,
            'auto_approve' => $request->auto_approve ? 1 : 0,
            'status' => $request->status ? 1 : 0,
            'description' => $request->description,
        ]);

        return $leave_type;
    }
}
