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
        $user = User::create([
            'name' => 'Patient',
            'email' => 'patient@mail.com',
            'password' => bcrypt('password'),
            'role' => 'patient',
        ]);

        $user->patient()->create([
            'gender' => 'male',
            'birth_date' => '1999-06-07',
            'age' => 19,
            'blood_group' => 'AB-',
        ]);

        Patient::factory(20)->create();
    }
}
