<?php

namespace Database\Factories;

use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Appointment>
 */
class AppointmentFactory extends Factory
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
            'problem' => fake()->sentence,
            'serial_no' => rand(1, 900),
            'date' => fake()->date('Y-m-d'),
            'status' => Arr::random(['complete', 'incomplete']),
        ];
    }
}
