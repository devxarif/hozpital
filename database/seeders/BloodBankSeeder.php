<?php

namespace Database\Seeders;

use App\Models\BloodBank;
use Illuminate\Database\Seeder;

class BloodBankSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $blood_groups = ['A+', 'B+', 'AB+', 'O+', 'A-', 'B-', 'AB-', 'O-'];

        foreach ($blood_groups as $blood_group) {
            BloodBank::create([
                'blood_group' => $blood_group,
                'bags' => rand(10, 50).' bags',
            ]);
        }
    }
}
