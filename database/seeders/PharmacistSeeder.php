<?php

namespace Database\Seeders;

use App\Models\Pharmacist;
use App\Models\User;
use Illuminate\Database\Seeder;

class PharmacistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Pharmacist',
            'email' => 'pharmacist@mail.com',
            'password' => bcrypt('password'),
            'role' => 'pharmacist',
        ]);

        Pharmacist::factory(20)->create();
    }
}
