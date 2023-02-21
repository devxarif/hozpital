<?php

namespace Database\Seeders;

use App\Models\Prescription;
use App\Models\PrescriptionMedicine;
use Illuminate\Database\Seeder;

class PrescriptionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Prescription::factory(100)->create();
        // Prescription::factory(100)->for(PrescriptionMedicine::factory(5)->create())->create();
    }
}
