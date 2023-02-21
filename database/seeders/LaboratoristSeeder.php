<?php

namespace Database\Seeders;

use App\Models\Laboratorist;
use App\Models\User;
use Illuminate\Database\Seeder;

class LaboratoristSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Laboratorist',
            'email' => 'laboratorist@mail.com',
            'password' => bcrypt('password'),
            'role' => 'laboratorist',
        ]);

        $user->laboratorist()->create([
            'avatar' => null,
        ]);

        Laboratorist::factory(20)->create();
    }
}
