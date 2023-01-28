<?php

namespace App\Http\Controllers\Organization;

use App\Models\User;
use App\Models\Invite;
use Illuminate\Http\Request;
use App\Traits\HasSubscription;
use App\Http\Controllers\Controller;
use App\Models\Organization;
use Illuminate\Support\Facades\Auth;
use App\Traits\HasLeaveBalance;
use App\Notifications\Organization\NewEmployeeJoined;

class InviteController extends Controller
{
    use HasSubscription, HasLeaveBalance;

    public function sendInvite(Request $request)
    {
        // Check if the user is limited to create employees
        if ($this->checkEmployeesLimitation(count($request->emails))) {
            session()->flash('error', __('You have reached the maximum number of employees'));
            return back();
        }

        $organization = currentOrganization();

        if ($organization->leaveTypes->count() == 0) {
            session()->flash('error', 'Please add leave types first');
            return redirect_to(route('leaveTypes.create'));
        }

        $request->validate([
            'emails.*' => 'required',
            'teams.*' => 'required',
        ]);

        $emails = $request->emails;
        $teams = $request->teams;

        if ($emails && $teams) {
            foreach ($emails as $key => $email) {
                if ($email && $teams[$key]) {
                    sendInvite($organization->id,$email, $teams[$key]);
                }
            }
        }

        session()->flash('success', 'Invite sent successfully');
        return back();
    }

    public function acceptInvite()
    {
        $invite = Invite::whereToken(request('token'))->firstOrFail();

        if ($invite->status == Invite::STATUS_ACCEPTED) {
            session()->flash('error', 'This invite has already been accepted.');
            return redirect()->route('login');
        }

        return inertia('Organization/EmployeeRegister', [
            'token' => $invite->token,
        ]);
    }

    public function storeEmployee(Request $request)
    {
        $request->validate([
            'name' => 'required|string',
            'password' => 'required|confirmed|min:8',
        ]);

        $invite = Invite::whereToken(request('token'))->firstOrFail();

        $organization = Organization::findOrFail($invite->organization_id);

         // Check if the user is limited to create employees
         if ($this->checkEmployeesLimitation(null, $organization)) {
             session()->flash('error', __('You cannot create account because of limited number of employees'));
             return back();
        }

        // check if the invite has already been accepted
        if (User::whereEmail($invite->email)->exists()) {
            session()->flash('error', 'This email is already registered.Please login.');
            return redirect()->route('login');
        }

        // create the user
        $user = User::create([
            'name' => $request->name,
            'email' => $invite->email,
            'role' => User::ROLE_EMPLOYEE,
            'password' => bcrypt($request->password),
        ]);

        // create the employee
        $employee = $user->employee()->create([
            'organization_id' => $invite->organization_id,
            'team_id' => $invite->team_id,
            'phone' => $invite->phone ?? '',
        ]);

        // mark as accepted the invite
        $invite->update(['status' => Invite::STATUS_ACCEPTED]);

        // Create leave balance for the employee
        $this->employeeLeaveBalanceCreate($invite->organization_id, $employee->id);

        $employee->organization->user->notify(new NewEmployeeJoined($employee->user, $employee->organization_id));

        // login the user
        if (Auth::attempt(['email' => $user->email, 'password' => $request->password])) {
            $request->session()->regenerate();

            session()->flash('success', 'Account has been created successfully and your are now logged in!');
            return redirect()->intended('/user/dashboard');
        }
    }
}
