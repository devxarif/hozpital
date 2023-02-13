<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\Doctor;
use App\Models\Patient;
use Carbon\CarbonPeriod;
use App\Models\Appointment;
use Illuminate\Support\Arr;
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
        // Appointment
        $doctors = Doctor::all();
        $startDate =  '2023-02-01';
        $endDate = '2023-04-20';
        $dateRange = iterator_to_array(CarbonPeriod::create($startDate, $endDate)->map(fn ($date) => $date->toDateString()));
        $index = rand(0, 70);

        $time = [
            ['start' => '08:00', 'end' => '08:30'],
            ['start' => '08:30', 'end' => '09:00'],
            ['start' => '10:00', 'end' => '10:30'],
            ['start' => '10:30', 'end' => '11:00'],
            ['start' => '11:30', 'end' => '12:00'],
            ['start' => '14:00', 'end' => '14:30'],
            ['start' => '14:30', 'end' => '15:00'],
            ['start' => '15:00', 'end' => '15:30'],
            ['start' => '15:30', 'end' => '16:00']
        ];
        $index_time = rand(0,8);

        foreach($doctors as $doctor){
            for ($i=0; $i < 20; $i++) {
                $start_time = $time[$index_time]['start'];
                $end_time = $time[$index_time]['end'];
                $slot = $start_time.' - '.$end_time;

                Appointment::create([
                    'doctor_id' => $doctor->id,
                    'patient_id' => Patient::inRandomOrder()->value('id'),
                    'problem' => fake()->realText,
                    'serial_no' => rand(1,500),
                    'date' => $dateRange[$index],
                    'start_time' => $start_time,
                    'end_time' =>$end_time,
                    'slot' => (string) $slot,
                    'status' => Carbon::parse($dateRange[$index])->isFuture() == 1 ? 'pending': Arr::random(['approved','cancelled','completed']),
                    'type' => 'offline',
                ]);
            }
        }



        // $table->foreignIdFor(Doctor::class)->constrained()->cascadeOnDelete();
        // $table->foreignIdFor(Patient::class)->constrained()->cascadeOnDelete();
        // $table->string('problem');
        // $table->string('serial_no');
        // $table->date('date');
        // $table->date('start_time');
        // $table->date('end_time');
        // $table->string('slot');
        // $table->enum('status', ['approved', 'pending','cancelled','completed']);
        // $table->enum('type', ['online', 'offline'])->default('offline');









    }
}
