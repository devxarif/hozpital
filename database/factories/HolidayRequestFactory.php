<?php

namespace Database\Factories;

use App\Models\Employee;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\HolidayRequest>
 */
class HolidayRequestFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $start_date = fake()->dateTimeBetween('-1 week', '+1 week')->format('Y-m-d');
        $end_date = fake()->dateTimeBetween($start_date, '+1 week')->format('Y-m-d');

        return [
            'organization_id' => Organization::inRandomOrder()->value('id'),
            'employee_id' => Employee::inRandomOrder()->value('id'),
            'title' => fake()->sentence,
            'start' => $start_date,
            'end' => $end_date,
            'days' => diffBetweenDays($start_date, $end_date),
            'note' => fake()->sentence,
        ];
    }
}
