<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;

class HomeController extends Controller
{
    //
    public function redirect() {
        if(Auth::id()) {
            if(Auth::user()->usertype == '0') {
                $doctors = Doctor::all();
                return view('user.home', compact('doctors'));
            } else {
                return view('admin.home');
            }
        } else {
            return redirect()->back();
        }
    }

    public function index() {

        if(Auth::id()) {
            return redirect('home');
        } else {
            $doctors = Doctor::all();
            return view('user.home', compact('doctors'));
        }
    }

    public function myappointment() {
        if(Auth::id()) {

            $userId = Auth::user()->id;
            $appointments = appointment::where('user_id', $userId)->get();
            return view('user.my_appointment', compact('appointments'));
        } else {
            return redirect()->back();
        }
    }

    public function appointmentCancel($id) {
        if (Auth::id()) {
            $appointment = Appointment::find($id);
    
            if ($appointment) {
                $appointment->delete();
            }
    
            return redirect()->back();
        } else {
            return redirect()->back();
        }
    }
    
}