<?php

namespace Database\Factories;

use App\Models\Manufacture;
use App\Models\MedicineCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Medicine>
 */
class MedicineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'medicine_category_id' => MedicineCategory::inRandomOrder()->value('id'),
            'manufacture_id' => Manufacture::inRandomOrder()->value('id'),
            'name' => fake()->name,
            'buying_price' => rand(100, 200),
            'selling_price' => rand(200, 400),
            'quantity' => rand(200,500),
            'description' => fake()->sentence,
            'expire_date' => $this->faker->dateTimeBetween('','+2 years'),
        ];
    }
}
