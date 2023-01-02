<?php

namespace Database\Seeders;

use App\Models\DiagnosticReport;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DiagnosticReportSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DiagnosticReport::factory(20)->create();
    }
}
