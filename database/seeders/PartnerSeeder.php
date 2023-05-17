<?php

namespace Database\Seeders;

use App\Models\Partner;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class PartnerSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $partners = [
            'assets/images/about/1.png',
            'assets/images/about/2.png',
            'assets/images/about/3.png',
            'assets/images/about/4.png',
            'assets/images/about/5.png',
            'assets/images/about/6.png',
        ];

        foreach ($partners as $partner) {
            Partner::create(['image' => $partner,]);
        }
    }
}
