<?php

namespace Database\Factories;

use App\Models\Invoice;
use Illuminate\Support\Arr;
use App\Models\IncomeCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Income>
 */
class IncomeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $invoice = Invoice::inRandomOrder()->first();

        return [
            'invoice_id' => $invoice->id,
            'invoice_number' => $invoice->invoice_number,
            'income_category_id' => IncomeCategory::inRandomOrder()->value('id'),
            'payment_method' => Arr::random(['stripe','paypal']),
            'amount' => rand(200, 1000),
            'title' => fake()->name,
            'description' => fake()->paragraph,
        ];
    }
}
