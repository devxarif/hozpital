<?php

namespace Database\Factories;

use App\Models\NewsCategory;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\News>
 */
class NewsFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'news_category_id' => NewsCategory::inRandomOrder()->value('id'),
            'name' => $this->faker->name,
            'image' => $this->faker->imageUrl(),
            'short_description' => $this->faker->sentence,
            'long_description' => $this->faker->paragraph(100),
        ];
    }
}
