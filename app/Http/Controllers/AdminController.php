<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\Doctor;

class AdminController extends Controller
{
    //
    // public function view()
    // {
    //     return view('admin.doctor.view_doctor');
    // }

    public function add()
    {
        return view('admin.doctor.add_doctor');
    }

    public function store(Request $request)
    {
        $doctor = new Doctor();


        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->phone = $request->phone;
        $doctor->speciality = $request->speciality;
        $doctor->room = $request->room;


        if($request->hasFile('image')){
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/doctors', $filename);
            $doctor->image = $filename;
        }

        $doctor->save();



        return redirect()->back();
    }
}
