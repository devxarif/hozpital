<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Employee;
use App\Models\LeaveType;
use App\Models\Department;
use App\Models\Designation;
use App\Models\LeaveBalance;
use App\Models\Organization;
use Illuminate\Database\Seeder;

class EmployeeSeeder extends Seeder
{
      /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Employee
        $user = User::create([
            'name' => 'Employee',
            'email' => 'employee@mail.com',
            'password' => bcrypt('password'),
            'avatar' => 'admin/img/default-user.png',
            'role' => 'employee',
            'username' => 'employee',
        ]);

        $kodebazarOrganization = Organization::where('organization_email', 'kodebazar@gmail.com')->first();
        $team = $kodebazarOrganization->teams->first();
        $employee = Employee::create([
            'user_id' => $user->id,
            'organization_id' => $kodebazarOrganization->id,
            'team_id' => $team->id,
            'phone' => '+8801681729831',
            'employee_id' => idGenerator(),
            'department_id' => Department::inRandomOrder()->where('organization_id', $kodebazarOrganization->id)->value('id'),
            'designation_id' => Designation::inRandomOrder()->where('organization_id', $kodebazarOrganization->id)->value('id'),
        ]);

        $leave_types = LeaveType::where('organization_id', $kodebazarOrganization->id)->get();
        foreach ($leave_types as $leave_type) {
            LeaveBalance::create([
                'employee_id' => $employee->id,
                'leave_type_id' => $leave_type->id,
                'total_days' => $leave_type->balance,
                'used_days' => rand(0, $leave_type->balance),
            ]);
        }

        // Employee 2
        $organization = Organization::inRandomOrder()->first();
        $user2 = User::create([
            'name' => 'Ariful Islam',
            'email' => 'arif@mail.com',
            'password' => bcrypt('password'),
            'avatar' => 'admin/img/default-user.png',
            'role' => 'employee',
            'username' => 'arif',
        ]);

        $team2 = $organization->teams->first();
        $employee = Employee::create([
            'user_id' => $user2->id,
            'organization_id' =>  $organization->id,
            'team_id' => $team2->id,
            'phone' => '+8801681729831',
            'employee_id' => idGenerator(),
            'department_id' => Department::inRandomOrder()->where('organization_id', $organization->id)->value('id'),
            'designation_id' => Designation::inRandomOrder()->where('organization_id', $organization->id)->value('id'),
        ]);

        $leave_types2 = LeaveType::where('organization_id', 4)->get();
        foreach ($leave_types2 as $leave_type) {
            LeaveBalance::create([
                'employee_id' => $employee->id,
                'leave_type_id' => $leave_type->id,
                'total_days' => $leave_type->balance,
                'used_days' => rand(0, $leave_type->balance),
            ]);
        }

        Employee::factory(50)->create()->each(function ($employee) {
            $leave_types = LeaveType::where('organization_id', $employee->organization_id)->get();
            foreach ($leave_types as $leave_type) {
                LeaveBalance::create([
                    'employee_id' => $employee->id,
                    'leave_type_id' => $leave_type->id,
                    'total_days' => $leave_type->balance,
                    'used_days' => rand(0, $leave_type->balance),
                ]);
            }
        });
    }
}
