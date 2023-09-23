<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;


use App\Models\Doctor;
use App\Models\Appointment;


class AdminController extends Controller
{
    //
    public function addView() {
        return view('admin.add_doctor');
    }

    public function upload(Request $request) {
        $doctor = new Doctor;
        $image = $request->file;
        $imageName = time().'.'.$image->getClientOriginalExtension();
        $request->file->move('doctorImage', $imageName); // path, filename
        $doctor->image = $imageName;
        $doctor->name = $request->name;
        $doctor->phone = $request->phone;
        $doctor->speciality = $request->speciality;
        $doctor->room = $request->room;
        $doctor->save();

        return redirect()->back()->with('message', 'Doctor added successfully');
    }

    public function showAppointment() {
        $appointments = Appointment::all();
        $userName = Auth::user()->name;
        return view('admin.showappointment', compact('appointments','userName'));;
    }

    public function approve($id) {
        $data = Appointment::find($id);
        $data->status= 1;
        $data->save();

        return redirect()->back();
    }

    public function cancel($id) {
        $data = Appointment::find($id);
        $data->status = 0;
        $data->save();

        return redirect()->back();
    }
}
