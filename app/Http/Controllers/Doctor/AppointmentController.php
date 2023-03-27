<?php

namespace App\Http\Controllers\Doctor;

use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $all_appointment = Appointment::currentDoctor()->get();
        $appointments_query = Appointment::query();

        $appointments = $appointments_query->currentDoctor()->with('patient.user:id,name,email', 'patient:id,user_id')
            ->when($request->keyword, function ($query, $keyword) {
                $query->whereHas('patient', function ($q) use ($keyword) {
                    $q->whereLike(['user.name', 'user.email'], $keyword);
                });
            })
            ->when($request->status, function ($query, $status) {
                if ($status != 'all') {
                    $query->where('status', $status);
                }
            })
            ->when($request->product_category, function ($query, $product_category) {
                $query->where('product_category_id', $product_category);
            })
            ->latest()
            ->paginate(config('kodebazar.rows_per_page'))
            ->withQueryString();

        return inertia('Doctor/Appointment/Index', [
            'appointments' => $appointments,
            'filter' => $request,
            'count_request' => [
                'all' => $all_appointment->count() ?? 0,
                'pending' => $all_appointment->where('status', 'pending')->count() ?? 0,
                'approved' => $all_appointment->where('status', 'approved')->count() ?? 0,
                'cancelled' => $all_appointment->where('status', 'cancelled')->count() ?? 0,
                'completed' => $all_appointment->where('status', 'completed')->count() ?? 0,
            ],
        ]);
    }

    public function statusUpdate(Request $request, Appointment $appointment)
    {
        $appointment->update([
            'status' => $request->status,
        ]);

        $this->flashSuccess('Appointment status updated successfully');

        return back();
    }
}
