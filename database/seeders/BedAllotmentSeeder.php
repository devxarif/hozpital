<?php

namespace Database\Seeders;

use App\Models\BedAllotment;
use Illuminate\Database\Seeder;

class BedAllotmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $allotments = BedAllotment::factory(500)->make();
        $allotments->chunk(100)->each(function ($chunk) {
            BedAllotment::insert($chunk->toArray());
        });
    }
}
