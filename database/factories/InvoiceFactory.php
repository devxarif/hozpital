<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Invoice>
 */
class InvoiceFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $date = $this->faker->dateTimeBetween('-7 day' );

        return [
            'invoice_number' => uniqid('in_'),
            'patient_id' => Patient::inRandomOrder()->value('id'),
            'title' => fake()->name,
            'creation_date' => $this->faker->dateTimeBetween('-7 day' ),
            'due_date' => $this->faker->dateTimeBetween('-1 day' ),
            'status' => Arr::random(['paid','unpaid']),
        ];
    }
}
