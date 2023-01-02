<?php

namespace Database\Factories;

use App\Models\Laboratorist;
use App\Models\Prescription;
use App\Models\DiagnosticReportType;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\DiagnosticReport>
 */
class DiagnosticReportFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'diagnostic_report_type_id' => DiagnosticReportType::inRandomOrder()->value('id'),
            'prescription_id' => Prescription::inRandomOrder()->value('id'),
            'laboratorist_id' => Laboratorist::inRandomOrder()->value('id'),
            'description' => fake()->sentence
        ];
    }
}
