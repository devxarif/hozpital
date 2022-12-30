<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Employee;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DepartmentEmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $departments = Department::all();

        foreach ($departments as $department) {
            $department->update([
                'employee_id' => Employee::where('organization_id', $department->organization_id)->value('id')
            ]);
        }
    }
}
