<?php

namespace Database\Factories;

use App\Models\BedType;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Bed>
 */
class BedFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'bed_type_id' => BedType::inRandomOrder()->value('id'),
            'charge' => rand(100,1000),
            'number' => rand(444,999),
            'floor' => Arr::random(['1st Floor','2nd Floor','3rd Floor','4th Floor','5th Floor','6th Floor','7th Floor','8th Floor','9th Floor','10th Floor']),
            'status' => Arr::random(['alloted','unalloted']),
            'description' => fake()->sentence
        ];
    }
}
