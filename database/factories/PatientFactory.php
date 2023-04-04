<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

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
            // 'address' => fake()->paragraph,
            // 'phone' => fake()->phoneNumber,
            'birth_date' => fake()->date(),
            'age' => rand(10, 50),
            'gender' => Arr::random(['male', 'female']),
            'blood_group' => Arr::random(['A+', 'B+', 'AB+', 'O+', 'A-', 'B-', 'AB-', 'O-']),
        ];
    }
}
