<?php

namespace Database\Seeders;

use App\Models\LeaveType;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class LeaveTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = [
            [
                'name' => 'Casual Leave',
                'color' => '#00D084',
                'balance' => 14,
                'description' => "Casual leave means leave to cover casual absence of the sales promotion employee from duty for personal reasons",
            ],
            [
                'name' => 'Paid Leave',
                'color' => '#EB144C',
                'balance' => 14,
                'description' => "Paid Leave is time allowed away from work for holiday, illness, etc. during which you receive your normal pay",
            ],
            [
                'name' => 'Sick Leave',
                'color' => '#FF9F43',
                'balance' => 7,
                'description' => "Sick Leave is time away from work because of illness",
            ],
        ];

        foreach ($types as $type) {
            LeaveType::create($type);
        }
    }
}
