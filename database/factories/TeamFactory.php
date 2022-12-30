<?php

namespace Database\Factories;

use Illuminate\Support\Arr;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Team>
 */
class TeamFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $team_name = Arr::random([
            'UI/UX',
            'Frontend',
            'Backend',
            'Mobile'
        ]);

        return [
            'organization_id' => Organization::inRandomOrder()->value('id'),
            'name' => $team_name,
            'slug' => strSlug($team_name),
        ];
    }
}
