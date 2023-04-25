<?php

namespace Database\Factories;

use App\Models\Patient;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class BillingFactory extends Factory
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
            'title' => Arr::random(['Bed Charge', 'Operation Charge', 'Medicine Charge', 'Other Charge']),
            'date' => $this->faker->dateTimeBetween('-7 day'),
            'status' => Arr::random(['paid', 'pending']),
            'discount_percentage' => rand(1, 10),
            'sub_total' => rand(200, 500),
            'total_amount' => rand(200, 400),
            'discount_amount' => rand(1, 50),
        ];
    }
}
