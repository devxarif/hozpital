<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Prescription>
 */
class PrescriptionFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'doctor_id' => Doctor::inRandomOrder()->value('id'),
            'patient_id' => Patient::inRandomOrder()->value('id'),
            'date' => fake()->date(),
            'case' => fake()->realText(),
            'note' => fake()->realText(),
            'advice' => fake()->realText(),
        ];
    }
}
