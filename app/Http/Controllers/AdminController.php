<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Doctor;


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
}
