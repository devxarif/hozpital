<?php

namespace Database\Factories;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Post>
 */
class PostFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $title = fake()->sentence($nbWords = 5, $variableNbWords = true);

        return [
            'user_id' => User::where('email', 'admin@mail.com')->value('id'),
            'title' => $title,
            'slug' => strSlug($title),
            'thumbnail' => fake()->imageUrl(),
            'short_description' => fake()->sentence(10),
            'long_description' => fake()->paragraph(50),
            'total_views' => rand(0, 100),
        ];
    }
}
