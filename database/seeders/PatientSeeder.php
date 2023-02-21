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
            'avatar' => null,
        ]);

        Patient::factory(20)->create();
    }
}
