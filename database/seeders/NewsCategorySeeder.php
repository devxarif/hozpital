<?php

namespace Database\Seeders;

use App\Models\NewsCategory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class NewsCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            'Medicine',
            'Equipments',
            'Heart',
            'Free counselling',
            'Lab test'
        ];

        foreach ($categories as $category) {
            NewsCategory::create(['name' => $category]);
        }
    }
}
