<?php

namespace Database\Seeders;

use App\Models\Patient;
use App\Models\User;
use Illuminate\Database\Seeder;

class PatientSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Patient',
            'email' => 'patient@mail.com',
            'password' => bcrypt('password'),
            'role' => 'patient',
        ]);

        Patient::factory(20)->create();
    }
}
