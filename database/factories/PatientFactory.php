<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Patient>
 */
class PatientFactory extends Factory
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
            'role' => 'patient',
        ]);

        return [
            'user_id' => $user->id,
            'avatar' => asset('admin/img/default-user.png')
        ];
    }
}
