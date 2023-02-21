<?php

namespace Database\Seeders;

use App\Models\Receptionist;
use App\Models\User;
use Illuminate\Database\Seeder;

class ReceptionistSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
            'name' => 'Receptionist',
            'email' => 'receptionist@mail.com',
            'password' => bcrypt('password'),
            'role' => 'receptionist',
        ]);

        $user->receptionist()->create([
            'avatar' => null,
        ]);

        Receptionist::factory(20)->create();
    }
}
