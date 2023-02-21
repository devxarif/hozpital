<?php

namespace Database\Seeders;

use App\Models\BedType;
use Illuminate\Database\Seeder;

class BedTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ['Cabin', 'Male Ward', 'Female Ward', 'ICU'];

        foreach ($types as $type) {
            BedType::create([
                'name' => $type,
                'description' => fake()->sentence,
            ]);
        }
    }
}
