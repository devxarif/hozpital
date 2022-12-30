<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\Department;
use App\Models\Designation;
use App\Models\Organization;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Employee>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        $organization = Organization::inRandomOrder()->first();
        $user = User::create([
            'name' => fake()->name(),
            'email' => fake()->unique()->safeEmail,
            'password' => bcrypt('password'),
            'avatar' => asset('admin/img/default-user.png'),
            'role' => 'employee',
        ]);

        $team = $organization->teams()->inRandomOrder()->first();

        return [
            'user_id' => $user->id,
            'organization_id' =>  $organization->id,
            'team_id' => $team->id,
            'phone' => '+8801698759865',
            'employee_id' => idGenerator(),
            'department_id' => Department::inRandomOrder()->where('organization_id', $organization->id)->value('id'),
            'designation_id' => Designation::inRandomOrder()->where('organization_id', $organization->id)->value('id'),
        ];
    }
}
