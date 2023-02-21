<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Traits\Organization\HasEmployeeReport;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    use HasEmployeeReport;

    public function index()
    {
        return inertia('Organization/Reports/Index');
    }

    public function employeeLeaveBalance()
    {
        $data = $this->getEmployeeLeaveBalance();

        return inertia('Organization/Reports/EmployeeLeaveBalance', $data);
    }

    public function employeeLeaveHistory()
    {
        $data = $this->getEmployeeLeaveHistory();

        return inertia('Organization/Reports/EmployeeLeaveHistory', $data);
    }

    public function employeeLeaveHistoryReport(Request $request)
    {
       return $this->getEmployeeLeaveHistoryReport($request);
    }

    public function teamLeaveBalance()
    {
        $data = $this->getTeamLeaveBalance();

        return inertia('Organization/Reports/TeamLeaveBalance', $data);
    }

    public function teamLeaveHistory()
    {
        $data = $this->getTeamLeaveHistory();

        return inertia('Organization/Reports/TeamLeaveHistory', $data);
    }

    public function teamLeaveHistoryReport(Request $request)
    {
       return $this->getTeamLeaveHistoryReport($request);
    }
}
