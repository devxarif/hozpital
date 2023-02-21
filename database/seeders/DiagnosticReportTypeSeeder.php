<?php

namespace Database\Seeders;

use App\Models\DiagnosticReportType;
use Illuminate\Database\Seeder;

class DiagnosticReportTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DiagnosticReportType::factory(5)->create();
    }
}
