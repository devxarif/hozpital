<?php

namespace Database\Seeders;

use App\Models\Industry;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class IndustrySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $industries = ['Restaurant/Food service','Retail','Education','Call centr','Agriculture/Forestr','Automotive','Business Service','Construction/Contractors','Finance and Insurance','Housing & Real Estate','Manufacturing','Telecommunications','Medical & healthcare','Non-Profit/Charity/Volunteers','Entertainments & Events','Consultant','Emergency Services','Government/Public Administration','Home Improvement Services','Information Technology','Media','Mining, Oil and Gas','Reseller /White label','Security Services','Software','Transportation/Logistics','Utilities','Veterinarian','Publishing'];

        foreach ($industries as $industry) {
            Industry::create([
                'name' => $industry,
            ]);
        }
    }
}
