<?php

namespace Database\Seeders;

use App\Models\Appointment;
use App\Models\AppointmentDays;
use App\Models\Doctor;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

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
        $doctors = Doctor::all();

        foreach ($doctors as $doctor) {
            $appointment_days = $doctor->appointmentDays()->create();
            $appointment_days->appointmentSlots()->create();
        }
    }
}
