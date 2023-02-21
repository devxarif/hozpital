<?php

namespace Database\Seeders;

use App\Models\Department;
use App\Models\Doctor;
use App\Models\User;
use Illuminate\Database\Seeder;

class DoctorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Doctor',
            'email' => 'doctor@mail.com',
            'password' => bcrypt('password'),
            'role' => 'doctor',
        ]);

        $user->doctor()->create([
            'department_id' => Department::inRandomOrder()->value('id'),
        ]);

        Doctor::factory(15)->create();
    }
}
