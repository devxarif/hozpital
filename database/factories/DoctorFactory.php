<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Department;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Doctor>
 */
class DoctorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::create([
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail,
            'password' => bcrypt('password'),
            'role' => 'doctor',
        ]);

        return [
            'user_id' => $user->id,
            'department_id' => Department::inRandomOrder()->value('id'),
            'avatar' => asset('admin/img/default-user.png')
        ];
    }
}
