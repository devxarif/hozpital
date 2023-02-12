<?php

namespace Database\Seeders;

use App\Models\Doctor;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;

class AppointmentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Appointment::factory(50)->create();
        $week_days = ['sunday', 'monday', 'tuesday', 'wednesday', 'thursday', 'friday', 'saturday'];
        $doctors = Doctor::all();

        foreach ($doctors as $doctor) {
            foreach ($week_days as $day_name) {
                $appointment_days = $doctor->appointmentSchedule()->create([
                    'name' => $day_name,
                    'status' => $day_name == 'sunday' ? 0: 1
                ]);

                for ($i=0; $i < 3; $i++) {
                    $appointment_days->appointmentSlots()->create([
                        'start' => Arr::random(['09:00', '10:00','12:00']),
                        'end' => Arr::random(['13:00', '15:00','20:00']),
                        'diff_time' => Arr::random([15,20,30]),
                    ]);
                }
            }
        }
    }
}
