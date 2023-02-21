<?php

namespace Database\Factories;

use App\Models\Prescription;
use App\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Arr;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\PrescriptionMedicine>
 */
class PrescriptionMedicineFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        return [
            'prescription_id' => Prescription::inRandomOrder()->value('id'),
            'medicine' => Product::where('type', 'medicine')->inRandomOrder()->value('name'),
            'frequency' => Arr::random(['1+1+1 (After Meal)', '1+1+1 (Before Meal)', '0+0+1 (Before Meal)']),
            'days' => Arr::random(['7 days', '2 weeks', '3 weeks', '4 weeks', 'Everyday']),
        ];
    }
}
