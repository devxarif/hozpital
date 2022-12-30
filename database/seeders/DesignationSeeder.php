<?php

namespace Database\Seeders;

use App\Models\Designation;
use App\Models\Organization;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class DesignationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $organizations = Organization::all();
        $designations = ['Public Relationship Officer',' Officer','Associate','Executive',' Head of Department'];

        foreach ($organizations as $organization) {
            foreach ($designations as $department) {
                $organization->designations()->create([
                    'name' => $department,
                ]);
            }
        }
    }
}
