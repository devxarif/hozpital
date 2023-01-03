<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Patient;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Patient',
            'email' => 'patient@mail.com',
            'password' => bcrypt('password'),
            'role' => 'patient',
        ]);

        $user->patient()->create([
            'avatar' => null,
        ]);

        Patient::factory(20)->create();
    }
}
