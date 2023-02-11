<?php

namespace Database\Seeders;

use App\Models\PrescriptionMedicine;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class PrescriptionMedicineSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        PrescriptionMedicine::factory(500)->create();
    }
}
