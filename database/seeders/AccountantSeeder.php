<?php

namespace Database\Seeders;

use App\Models\Accountant;
use App\Models\User;
use Illuminate\Database\Seeder;

class AccountantSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Accountant',
            'email' => 'accountant@mail.com',
            'password' => bcrypt('password'),
            'role' => 'accountant',
        ]);

        Accountant::factory(20)->create();
    }
}
