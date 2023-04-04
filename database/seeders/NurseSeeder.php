<?php

namespace Database\Seeders;

use App\Models\Nurse;
use App\Models\User;
use Illuminate\Database\Seeder;

class NurseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Nurse',
            'email' => 'nurse@mail.com',
            'password' => bcrypt('password'),
            'role' => 'nurse',
        ]);

        Nurse::factory(20)->create();
    }
}
