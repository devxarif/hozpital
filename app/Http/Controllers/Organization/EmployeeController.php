<?php

namespace App\Http\Controllers\Organization;

use App\Models\Team;
use App\Models\User;
use App\Models\Employee;
use Illuminate\Http\Request;
use App\Traits\HasSubscription;
use App\Http\Controllers\Controller;
use App\Traits\HasLeaveBalance;
use App\Http\Requests\EmployeeUpdateRequest;
use App\Notifications\Organization\NewEmployeeJoined;
use App\Http\Requests\Organization\EmployeeCreateRequest;

class EmployeeController extends Controller
{
    use HasSubscription, HasLeaveBalance;

    public function index()
    {
        $teams = Team::where('organization_id', currentOrganization()->id)->get(['id', 'name', 'slug']);
        $employees = Employee::with('user:id,name,email,avatar', 'team:id,name')->where('organization_id', currentOrganization()->id)->get();

        return inertia('Organization/Employees', [
            'teams' => $teams,
            'employees' => $employees,
        ]);
    }

    public function store(EmployeeCreateRequest $request)
    {
        // Check if the user is limited to create employees
        if ($this->checkEmployeesLimitation()) {
            session()->flash('error', __('You have reached the maximum number of employees'));
            return back();
        }

        $organization = currentOrganization();

        if ($organization->leaveTypes->count() == 0) {
            session()->flash('error', 'Please add leave types first');
            return redirect_to(route('leaveTypes.create'));
        }

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['role'] = User::ROLE_EMPLOYEE;
        $data['password'] = bcrypt($request->password);

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $request->validate([
                'avatar' => ['image', 'mimes:jpeg,png,jpg'],
            ]);
            $url = uploadFileToPublic('avatars', $request->avatar);
            $data['avatar'] = $url;
        }

        $user = User::create($data);


       $employee = $user->employee()->create([
            'user_id' => $user->id,
            'organization_id' => $organization->id,
            'team_id' => $request->team_id,
            'phone' => $request->phone ?? '',
        ]);

        // Create leave balance for the employee
        $this->employeeLeaveBalanceCreate($organization->id, $employee->id);

        $employee->organization->user->notify(new NewEmployeeJoined($employee->user, $employee->organization_id));

        session()->flash('success', 'Employee created successfully!');
        return back();
    }

    public function show(User $employee)
    {
        $user = $employee;
        $userEmployee = $user->employee;
        $user->load('employee.team:id,name');

        // organization summary
        $leave_requests = $userEmployee->leaveRequests;
        $summary = [
             'total_rejected_leave_requests' => $leave_requests->where('status','rejected')->count(),
             'total_pending_leave_requests' => $leave_requests->where('status','pending')->count(),
             'total_approved_leave_requests' => $leave_requests->where('status','approved')->count(),
         ];

        // Leave balance
        $leave_balances = $userEmployee->leaveBalances->load('leaveType:id,name');

        return inertia('Organization/EmployeeDetails',[
            'user' => $user,
            'summary' => $summary,
            'leave_balances' => $leave_balances,
        ]);
    }

    public function inviteEmployee(Request $request)
    {
        $request->validate([
            'email' => 'required|email|max:255',
            'team_id' => 'required|integer',
        ]);

        return $request;
    }

    public function update(EmployeeUpdateRequest $request, Employee $employee)
    {
        $user = $employee->user;

        $data['name'] = $request->name;
        $data['email'] = $request->email;
        $data['role'] = User::ROLE_EMPLOYEE;
        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        if ($request->hasFile('avatar') && $request->file('avatar')->isValid()) {
            $request->validate([
                'avatar' => ['image', 'mimes:jpeg,png,jpg'],
            ]);
            $url = uploadFileToPublic('avatars', $request->avatar);
            $data['avatar'] = $url;
        }

        $user->update($data);

        $user->employee()->update([
            'user_id' => $user->id,
            'organization_id' => currentOrganization()->id,
            'team_id' => $request->team_id,
            'phone' => $request->phone ?? '',
        ]);

        session()->flash('success', 'Employee updated successfully!');
        return back();
    }

    public function destroy(User $employee)
    {
        $employee->delete();
        $employee->employee()->delete();

        session()->flash('success', 'Employee deleted successfully!');
        return back();
    }

    public function fetchEmployees()
    {
        $employees = Employee::select('id','user_id')
            ->where('organization_id', currentOrganization()->id)
            ->with('user:id,name')
            ->get()
            ->transform(function ($employee) {
                return [
                    'id' => $employee->id,
                    'name' => $employee->user->name ?? 'No name available',
                ];
            });

        return $employees;
    }
}
