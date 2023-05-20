<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Department>
 */
class DepartmentFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'name' => fake()->name,
            'short_description' => fake()->sentence,
            'description' => fake()->paragraph(50),
            'show_in_header' => fake()->boolean,
            'show_in_footer' => fake()->boolean,
        ];
    }
}
