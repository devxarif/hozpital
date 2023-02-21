<?php

namespace Database\Seeders;

use App\Models\LeaveBalance;
use App\Models\LeaveType;
use App\Models\User;
use Illuminate\Database\Seeder;

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
                'description' => 'Casual leave means leave to cover casual absence of the sales promotion employee from duty for personal reasons',
            ],
            [
                'name' => 'Paid Leave',
                'color' => '#EB144C',
                'balance' => 14,
                'description' => 'Paid Leave is time allowed away from work for holiday, illness, etc. during which you receive your normal pay',
            ],
            [
                'name' => 'Sick Leave',
                'color' => '#FF9F43',
                'balance' => 7,
                'description' => 'Sick Leave is time away from work because of illness',
            ],
        ];

        $users = User::where('role', '!=', 'patients')->get();

        foreach ($types as $type) {
            $leave_type = LeaveType::create($type);

            foreach ($users as $user) {
                LeaveBalance::create([
                    'user_id' => $user->id,
                    'leave_type_id' => $leave_type->id,
                    'total_days' => $leave_type->balance,
                    'used_days' => rand(0, $leave_type->balance),
                ]);
            }
        }
    }
}
