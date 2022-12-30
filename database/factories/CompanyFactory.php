<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Country;
use App\Models\Industry;
use App\Models\TeamSize;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class OrganizationFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $user = User::create([
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail,
            'password' => bcrypt('password'),
            'avatar' => asset('admin/img/default-user.png'),
        ]);

        return [
            'user_id' => $user->id,
            'country_id' => Country::inRandomOrder()->value('id'),
            'team_size_id' => TeamSize::inRandomOrder()->value('id'),
            'industry_id' => Industry::inRandomOrder()->value('id'),
        ];
    }
}
