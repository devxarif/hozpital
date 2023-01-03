<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Pharmacist;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PharmacistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Pharmacist',
            'email' => 'pharmacist@mail.com',
            'password' => bcrypt('password'),
            'role' => 'pharmacist',
        ]);

        $user->pharmacist()->create([
            'avatar' => null,
        ]);

        Pharmacist::factory(20)->create();
    }
}
