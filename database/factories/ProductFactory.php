<?php

namespace Database\Factories;

use App\Models\Manufacture;
use App\Models\ProductCategory;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

class ProductFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'product_category_id' => ProductCategory::inRandomOrder()->value('id'),
            'manufacture_id' => Manufacture::inRandomOrder()->value('id'),
            'name' => fake()->name,
            'image' => fake()->imageUrl(),
            'buying_price' => rand(100, 200),
            'selling_price' => rand(200, 400),
            'quantity' => rand(200, 500),
            'short_description' => fake()->sentence,
            'description' => fake()->paragraph(200),
            'type' => Arr::random(['medicine', 'others']),
            'expire_date' => $this->faker->dateTimeBetween('', '+2 years'),
        ];
    }
}
