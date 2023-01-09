<?php

namespace Database\Seeders;

use App\Models\BedFloor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BedFloorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $floors = ['Ground Floor', '1st Floor', '2nd Floor', '3rd Floor', '4th Floor', '5th Floor', '6th Floor', '7th Floor', '8th Floor', '9th Floor', '10th Floor'];

        foreach ($floors as $floor) {
            BedFloor::create([
                'name' => $floor,
                'description' => fake()->paragraph,
            ]);
        }
    }
}
