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
        return [
            'title' => fake()->name,
            'income_category_id' => IncomeCategory::inRandomOrder()->value('id'),
            'invoice_number' => uniqid('inv_'),
            'amount' => rand(200, 1000),
            'date' => fake()->dateTime(),
            'description' => fake()->paragraph,
            'attachment' => 'admin/img/sample.pdf',
        ];
    }
}
