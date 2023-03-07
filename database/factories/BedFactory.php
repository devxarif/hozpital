<?php

namespace Database\Factories;

use App\Models\BedFloor;
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
            'bed_floor_id' => BedFloor::inRandomOrder()->value('id'),
            'charge' => rand(100, 1000),
            'number' => rand(444, 999),
            'status' => Arr::random(['alloted', 'free']),
            'description' => fake()->sentence,
        ];
    }
}
