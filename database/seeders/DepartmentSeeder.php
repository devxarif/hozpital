<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Department;
use App\Models\Organization;
use Illuminate\Database\Seeder;

class DepartmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Department::factory(10)->create();

        // $organizations = Organization::all();
        // $departments = ['Marketing',' Information Technology','Services','Sales','Product','HR'];

        // foreach ($organizations as $organization) {
        //     foreach ($departments as $department) {
        //         Department::create([
        //             'organization_id' => $organization->id,
        //             'name' => $department,
        //         ]);
        //     }
        // }
    }
}
