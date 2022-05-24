<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Doctor;
use Illuminate\Support\Facades\File;

class AdminController extends Controller
{

    public function viewDoctor()
    {
        $doctor = Doctor::paginate(5);
        return view('admin.doctor.view_doctor', ['doctors'=>$doctor]);
    }

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



        return redirect('view_doctor');
    }

    public function deleteDoctor($id)
    {
        $doctor = Doctor::find($id);

        $doctor->delete();

        return redirect()->back();
    }


    public function editDoctor($id)
    {
        $doctor= Doctor::find($id);
        return view('admin.doctor.update_doctor', ['doctors'=>$doctor]);
    }



    public function updateDoctor(Request $request)
    {
        $doctor= Doctor::find($request->id);
        $doctor->name = $request->name;
        $doctor->email = $request->email;
        $doctor->phone = $request->phone;
        $doctor->speciality = $request->speciality;
        $doctor->room = $request->room;


        if($request->hasFile('image')){

            $destination = 'uploads/resorts' . $doctor->image;
            if(File::exists($destination)){
                File::delete($destination);
            }

            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time().'.'.$extension;
            $file->move('uploads/doctors', $filename);
            $doctor->image = $filename;
        }
        $doctor->save();



        return redirect('view_doctor');
    }









    //appointment
    public function viewAppointment()
    {
        $appointment = Appointment::all();
        return view('admin.appointment.view_appointment', ['appointments'=>$appointment]);
    }


    public function approved($id)
    {
        $appointment = Appointment::find($id);
        $appointment->status = 'Approved';
        $appointment->save();

        return redirect()->back()->with('message', 'Successfully Approved');
    }

    public function canceled($id)
    {
        $appointment = Appointment::find($id);
        $appointment->status = 'Canceled';
        $appointment->save();
        return redirect()->back()->with('message', 'Successfully Canceled');
    }
}
