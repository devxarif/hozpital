<?php

namespace Database\Factories;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BloodDonor>
 */
class BloodDonorFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name,
            'blood_group' => Arr::random(['A+', 'B+','AB+','O+','A-', 'B-','AB-','O-']),
            'phone' => fake()->phoneNumber,
            'gender' => Arr::random(['male','female']),
            'email' => fake()->email,
            'address' => fake()->address,
            'age' => rand(20,30),
        ];
    }
}
