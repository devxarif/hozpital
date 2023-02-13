<?php

namespace App\Http\Controllers\Doctor;

use Carbon\Carbon;
use Illuminate\Http\Request;
use App\Models\AppointmentSchedule;
use App\Http\Controllers\Controller;

class AppointmentScheduleController extends Controller
{
        /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $diff_times = AppointmentSchedule::$diff_times;
        $schedules = AppointmentSchedule::currentDoctor()
            ->select('id','doctor_id','name','status')
            ->with('appointmentSlots:id,appointment_schedule_id,start_time,end_time,diff_time')
            ->get()
            ->transform(fn ($appointmentSchedule) => [
                'id' => $appointmentSchedule->id,
                'name' => $appointmentSchedule->name,
                'status' => $appointmentSchedule->status,
                'appointment_slots' => $appointmentSchedule->appointmentSlots->transform(fn ($slot) => [
                    'id' => $slot->id,
                    'start_time' => $slot->start_time,
                    'end_time' => $slot->end_time,
                    'diff_time' => $slot->diff_time,
                    'start' => [
                        'hours' => explode(':', $slot->start_time)[0],
                        'minutes' => explode(':', $slot->start_time)[1],
                    ],
                    'end' => [
                        'hours' => explode(':', $slot->end_time)[0],
                        'minutes' => explode(':', $slot->end_time)[1],
                    ],
                ])
            ]);

        return inertia('Doctor/Appointment/Schedule', compact('schedules','diff_times'));
    }


    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  AppointmentSchedule $appointmentSchedule
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AppointmentSchedule $appointmentSchedule)
    {
        $appointmentSchedule->appointmentSlots()->delete();

        $slots = $request->slots;

        foreach ($slots as $slot) {
            if ($slot['diff_time'] && $slot['start'] && $slot['end']) {
                $start_time = Carbon::parse($slot['start']['hours'].':'.$slot['start']['minutes'])->format('H:i');
                $end_time = Carbon::parse($slot['end']['hours'].':'.$slot['end']['minutes'])->format('H:i');

                $appointmentSchedule->appointmentSlots()->create([
                    'start_time' => $start_time,
                    'end_time' => $end_time,
                    'diff_time' => $slot['diff_time'],
                ]);
            }
        }

        $this->flashSuccess('Appointment schedule updated successfully');
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  AppointmentSchedule $appointmentSchedule
     * @return \Illuminate\Http\Response
     */
    public function statusUpdate(Request $request, AppointmentSchedule $appointmentSchedule){
        $appointmentSchedule->update(['status' => $request->status]);

        return true;
    }
}
