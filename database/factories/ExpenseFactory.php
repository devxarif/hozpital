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
        return [
            'title' => fake()->name,
            'expense_category_id' => ExpenseCategory::inRandomOrder()->value('id'),
            'invoice_number' => uniqid('inv_'),
            'amount' => rand(200, 1000),
            'date' => fake()->dateTime(),
            'description' => fake()->paragraph,
            'attachment' => 'admin/img/sample.pdf',
        ];
    }
}
