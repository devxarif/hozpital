<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = Role::first();

        $admin = User::create([
            'Name' => 'Offday Admin',
            'email' => 'admin@mail.com',
            'username' => 'admin',
            'password' => bcrypt('password'),
            'role' => 'admin',
        ]);

        $developer = User::create([
            'Name' => 'Developer',
            'email' => 'developer@mail.com',
            'username' => 'admin',
            'password' => bcrypt('password@12345'),
            'role' => 'admin',
        ]);

        $admin->assignRole($role);
        $developer->assignRole($role);
    }
}
