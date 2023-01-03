<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Nurse;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NurseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Nurse',
            'email' => 'nurse@mail.com',
            'password' => bcrypt('password'),
            'role' => 'nurse',
        ]);

        $user->nurse()->create([
            'avatar' => null,
        ]);

        Nurse::factory(20)->create();
    }
}
