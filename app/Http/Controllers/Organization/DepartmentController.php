<?php

namespace App\Http\Controllers\Organization;

use App\Http\Controllers\Controller;
use App\Models\Department;
use App\Models\Employee;

class DepartmentController extends Controller
{
    public function index()
    {
        // return Employee::with('department')->first();
        // return Employee::all();
        $departments = Department::organizationDepartments()
        ->with(['employee' => function ($q) {
            return $q->select('id', 'user_id', 'organization_id')->with('user:id,name,email');
        }, 'employees' => function ($q) {
            return $q->select('id', 'user_id', 'organization_id')->with('user:id,name,email');
        }])->paginate(15);

        return inertia('Organization/Department/Index', [
            'departments' => $departments,
        ]);
    }
}
