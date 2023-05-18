<?php

namespace Database\Seeders;

use App\Models\Service;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $services = [
            [
                'name' => 'Laboratory services',
                'image' => 'assets/images/service/flask.png',
                'short_description' => fake()->sentence(20),
                'description' => fake()->paragraph(50),
            ],
            [
                'name' => 'Heart Disease',
                'image' => 'assets/images/service/heart-attack.png',
                'short_description' => fake()->sentence(20),
                'description' => fake()->paragraph(50),
            ],
            [
                'name' => 'Dental Care',
                'image' => 'assets/images/service/tooth.png',
                'short_description' => fake()->sentence(20),
                'description' => fake()->paragraph(50),
            ],
            [
                'name' => 'Body Surgery',
                'image' => 'assets/images/service/bariatric-surgery.png',
                'short_description' => fake()->sentence(20),
                'description' => fake()->paragraph(50),
            ],
            [
                'name' => 'Neurology Surgery',
                'image' => 'assets/images/service/brain-surgery.png',
                'short_description' => fake()->sentence(20),
                'description' => fake()->paragraph(50),
            ],
            [
                'name' => 'Eye Surgery',
                'image' => 'assets/images/service/eye-surgery.png',
                'short_description' => fake()->sentence(20),
                'description' => fake()->paragraph(50),
            ],

        ];

        foreach ($services as $service) {
            Service::create($service);
        }
    }
}


