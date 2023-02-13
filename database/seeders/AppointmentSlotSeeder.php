<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Support\Arr;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class AppointmentSlotSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $week_days = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
        $doctors = Doctor::all();

        foreach ($doctors as $doctor) {
            foreach ($week_days as $day_name) {
                $appointment_days = $doctor->appointmentSchedule()->create([
                    'name' => $day_name,
                    'status' => $day_name == 'sunday' ? 0: 1
                ]);

                for ($i=0; $i < 3; $i++) {
                    $start_time = ['08:00','10:00','14:00'];
                    $end_time = ['09:00','12:00','16:00'];

                    $appointment_days->appointmentSlots()->create([
                        'start_time' => $start_time[$i],
                        'end_time' => $end_time[$i],
                        'slot' => $start_time[$i].' - '.$end_time[$i],
                    ]);
                }
            }
        }
    }
}
