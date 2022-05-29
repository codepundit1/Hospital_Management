<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\Doctor;
use App\Notifications\SendEmailNotification;
use Illuminate\Notifications\Notification;
use Illuminate\Support\Facades\File;
use App\Models\User;

class AdminController extends Controller
{


    //Doctor

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


        $this->validate($request, [
            'name' => 'required|min:2|max:50|unique:doctors',
            'email' => 'required|unique:doctors',
            'phone' => 'required|max:15|unique:doctors',

        ]);


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

        flash('Added Successfully')->success();
        $doctor->save();



        return redirect('view_doctor');
    }

    public function deleteDoctor($id)
    {
        $doctor = Doctor::find($id);

        $doctor->delete();

        flash('Deleted Successfully')->success();
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

        flash('Updated Successfully')->success();


        return redirect('view_doctor')->with('message', 'Successfully Updated');
    }













    //email
    public function viewEmail($id)
    {
        $appointment = Appointment::find($id);
        return view('admin.view_email', ['appointments'=>$appointment]);
    }


    public function sendMail(Request $request, $id)
    {
        $appointment = Appointment::find($id);
        $details = [
            'greeting' => $request->greeting,
            'body' => $request->body,
            'actiontext' => $request->actiontext,
            'actionurl' => $request->actionurl,
            'endpart' => $request->endpart,
        ];

        $appointment->notify(new SendEmailNotification($details));
        return redirect()->back();

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

    public function deleteAppointment($id)
    {
        $appointment = Appointment::find($id);

        $appointment->delete();

        flash('Deleted Successfully')->success();
        return redirect()->back();
    }
}
