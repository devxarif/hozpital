<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

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
        $date = $this->faker->dateTimeBetween('-7 day');

        return [
            'invoice_number' => uniqid('in_'),
            'patient_id' => Patient::inRandomOrder()->value('id'),
            'title' => fake()->name,
            'date' => $this->faker->dateTimeBetween('-7 day'),
            'status' => Arr::random(['paid', 'unpaid']),
            'vat_percentage' => rand(1, 10),
            'total_amount' => rand(200, 500),
            'discount_amount' => rand(1, 50),
        ];
    }
}
