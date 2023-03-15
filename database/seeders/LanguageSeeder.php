<?php

namespace Database\Seeders;

use App\Models\Language;
use Illuminate\Database\Seeder;

class LanguageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Language::create([
            'name' => 'English',
            'language_code' => 'en',
            'country_code' => 'gb',
        ]);

        Language::create([
            'name' => 'Bangla',
            'language_code' => 'bn',
            'country_code' => 'bd',
        ]);
    }
}
