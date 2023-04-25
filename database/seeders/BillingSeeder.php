<?php

namespace Database\Seeders;

use App\Models\Billing;
use App\Models\BillingItem;
use Illuminate\Database\Seeder;

class BillingSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Billing::factory(20)->create()->each(function ($billing) {
            BillingItem::factory(5)->create(['billing_id' => $billing->id]);
        });
    }
}
