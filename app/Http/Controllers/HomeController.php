<?php

namespace App\Http\Controllers;

use App\Models\Doctor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Appointment;

class HomeController extends Controller
{

    //auth id view
    public function redirect()
    {
        if(Auth::id())
        {
            if(Auth::user()->userType==0)
            {
                $doctor = Doctor::all();
                return view('user.home', ['doctors'=>$doctor]);
            }

            else
            {
                return view('admin.home');
            }

        }


        else
        {
            return redirect()->back();
        }
    }


    //Admin and uer view
    public function index()
    {
        if(Auth::id())
        {
            return redirect('home');
        }
        else
        {
            $doctor = Doctor::all();
            return view('user.home', ['doctors'=>$doctor]);
        }
    }


    //apointment
    public function apointment(Request $request)
    {
        $apointment = new Appointment();
        $apointment->fullname = $request->fullname;
        $apointment->email = $request->email;
        $apointment->date = $request->date;
        $apointment->selectdoctor = $request->selectdoctor;
        $apointment->phone = $request->phone;
        $apointment->message = $request->message;
        $apointment->status = 'In progress';


        if(Auth::id())
        {
            $apointment->user_id = Auth::user()->id;
        }

        $apointment->save();

        return redirect()->back()->with('message', 'Appointment Request Successful . We will contact with you soon');
    }

    public function myappointment()
    {
        if(Auth::id())
        {
            $userid = Auth::user()->id;
            $appointment = Appointment::where('user_id',$userid)->get();
            return view('user.my_appointment', ['appointments'=>$appointment]);
        }
        else
        {
            return redirect()->back();
        }

    }


    //delete appontmnet


    public function deleteAppointment($id)
    {
        $data = Appointment::find($id);
        $data -> delete();
        return redirect()->back()->with('message', 'User Deleted Successfully');
    }




}
