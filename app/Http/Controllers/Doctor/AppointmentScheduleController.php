<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\AppointmentSchedule;
use Illuminate\Http\Request;

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
            ->with('appointmentSlots:id,appointment_schedule_id,start,end,diff_time')
            ->get();

        // $blood_donations = BloodDonation::with('bloodDonor')->latest()->paginate(20)->withQueryString();

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
        $appointmentSchedule->update([
            "sunday" => $request->sunday ? true : false,
            "monday" => $request->monday ? true : false,
            "tuesday" => $request->tuesday ? true : false,
            "wednesday" => $request->wednesday ? true : false,
            "thursday" => $request->thursday ? true : false,
            "friday" => $request->friday ? true : false,
            "saturday" => $request->saturday ? true : false,
        ]);

        // $appointmentSchedule->

        (new UpdateBloodDonationService())->execute($request, $bloodDonation);

        $this->flashSuccess('Blood donation updated successfully');
        return back();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  Request $request
     * @param  AppointmentSchedule $appointmentSchedule
     * @return \Illuminate\Http\Response
     */
    public function statusUpdate(AppointmentSchedule $appointmentSchedule){
        $appointmentSchedule->update(['status' => $appointmentSchedule->status ? 0:1]);

        return true;
    }
}
