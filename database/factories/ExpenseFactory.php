<?php

namespace Database\Factories;

use App\Models\Invoice;
use Illuminate\Support\Arr;
use App\Models\ExpenseCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Expense>
 */
class ExpenseFactory extends Factory
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
            'expense_category_id' => ExpenseCategory::inRandomOrder()->value('id'),
            'payment_method' => Arr::random(['stripe','paypal']),
            'amount' => rand(200, 1000),
            'title' => fake()->name,
            'description' => fake()->paragraph,
        ];
    }
}
