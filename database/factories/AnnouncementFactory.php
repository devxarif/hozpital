<?php

namespace Database\Factories;

use Illuminate\Support\Arr;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Announcement>
 */
class AnnouncementFactory extends Factory
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
            'description' => fake()->realText(200),
            'start' => fake()->date('Y-m-d'),
            'end' => fake()->date('Y-m-d'),
            'status' => Arr::random(['public','private']),
        ];
    }
}
