<?php

namespace Database\Seeders;

use App\Models\Country;
use App\Models\Holiday;
use Illuminate\Database\Seeder;

class HolidaySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $bdCountry = Country::where('code', 'bd')->first();

        $this->createHoliday($bdCountry);
    }

    public function createHoliday($country)
    {
        $holidays = getHolidays($country->code);

        for ($i = 0; $i < count($holidays); $i++) {
            $holiday_data[] = [
                'title' => $holidays[$i]['title'],
                'start' => $holidays[$i]['start'],
                'end' => $holidays[$i]['end'],
                'days' => diffBetweenDays($holidays[$i]['start'], $holidays[$i]['end']),
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }

        $holiday_chunks = array_chunk($holiday_data, ceil(count($holiday_data) / 3));

        foreach ($holiday_chunks as $country) {
            Holiday::insert($country);
        }
    }
}
