<?php

namespace Database\Factories;

use App\Models\Bed;
use App\Models\Doctor;
use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\BedAllotment>
 */
class BedAllotmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $start = fake()->dateTimeBetween('next Monday', 'next Monday +7 days');
        $end = fake()->dateTimeBetween($start, $start->format('Y-m-d') . ' +2 days');

        return [
            'bed_id' => Bed::inRandomOrder()->value('id'),
            'patient_id' => Patient::inRandomOrder()->value('id'),
            'doctor_id' => Doctor::inRandomOrder()->value('id'),
            'allotment_time' => $start,
            'discharge_time' => $end,
            'description' => fake()->sentence(),
        ];
    }
}
