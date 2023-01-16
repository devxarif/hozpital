<?php

namespace Database\Factories;

use App\Models\LeaveType;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\LeaveRequest>
 */
class LeaveRequestFactory extends Factory
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
            'user_id' => User::inRandomOrder()->value('id'),
            'leave_type_id' => LeaveType::inRandomOrder()->value('id'),
            'start' => $start_date,
            'end' => $end_date,
            'days' => diffBetweenDays($start_date, $end_date),
            'reason' => fake()->sentence,
            'status' => fake()->randomElement(['pending', 'approved', 'rejected']),
        ];
    }
}
