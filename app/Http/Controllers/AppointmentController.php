<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // Import the Auth facade
use App\Models\Appointment;

class AppointmentController extends Controller
{
    //
    public function appointmentAdd(Request $request) {
        $appointment = new Appointment;
        $appointment->name = $request->name;
        $appointment->email = $request->email;
        $appointment->phone = $request->phone;
        $appointment->date = $request->date;
        $appointment->doctor = $request->doctor;
        $appointment->status = false;
        $appointment->message = $request->message;
        $appointment->user_id = Auth::user()->id;
        $appointment->save();
    return redirect()->back()->with('message', 'Appointment successful. we will contact with you soon');
    }
}
