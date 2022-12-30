<?php

namespace Database\Seeders;

use App\Models\Team;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class TeamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $teams = [
            [
                'organization_id' => 1,
                'name' => 'UI/UX',
                'slug' => 'ui-ux',
            ],
            [
                'organization_id' => 1,
                'name' => 'Frontend',
                'slug' => 'frontend',
            ],
            [
                'organization_id' => 1,
                'name' => 'Backend',
                'slug' => 'backend',
            ],
            [
                'organization_id' => 2,
                'name' => 'UI/UX',
                'slug' => 'ui-ux',
            ],
            [
                'organization_id' => 2,
                'name' => 'Frontend',
                'slug' => 'frontend',
            ],
            [
                'organization_id' => 2,
                'name' => 'Backend',
                'slug' => 'backend',
            ],
            [
                'organization_id' => 3,
                'name' => 'UI/UX',
                'slug' => 'ui-ux',
            ],
            [
                'organization_id' => 3,
                'name' => 'Frontend',
                'slug' => 'frontend',
            ],
            [
                'organization_id' => 3,
                'name' => 'Backend',
                'slug' => 'backend',
            ],
            [
                'organization_id' => 4,
                'name' => 'UI/UX',
                'slug' => 'ui-ux',
            ],
            [
                'organization_id' => 4,
                'name' => 'Frontend',
                'slug' => 'frontend',
            ],
            [
                'organization_id' => 4,
                'name' => 'Backend',
                'slug' => 'backend',
            ]
        ];

        foreach ($teams as $team) {
            Team::create($team);
        }

        // Team::factory(50)->create();
    }
}
