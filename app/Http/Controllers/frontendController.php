<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use App\Models\Time;
use App\Models\User;
use App\Models\booking;
use App\Mail\AppointmentMail;
use App\Models\Prescription;

class frontendController extends Controller
{
    public function index(){
        date_default_timezone_set('Asia/Jakarta');
        if(request('date')){
            $doctors = $this->findDoctorByDate(request('date'));
            return view('Vjs_welcome',compact('doctors'));
        }
        $doctors = Appointment::where('date',date('d-m-Y'))->get();
        //  dd($doctors);
        return view('Vjs_welcome',compact('doctors'));
    }

    //Controller indexfronetend untuk test templates vuexy
    public function indexfrontend(){
        date_default_timezone_set('Asia/Jakarta');
        if(request('date')){
            $doctors = $this->findDoctorByDate(request('date'));
            return view('frontend.index',compact('doctors'));
        }
        $doctors = Appointment::where('date',date('d-m-Y'))->get();
        //  dd($doctors);
        return view('frontend.index',compact('doctors'));
    }


    public function show($doctorId,$date)
    {
        $appointment = Appointment::where('user_id',$doctorId)->where('date',$date)->first();
        $times = Time::where('appointment_id',$appointment->id)->where('status',0)->get();
        $user =User::where('id',$doctorId)->first();
        $doctor_id = $doctorId;

        return view('appointment',compact('appointment','times','date','user','doctor_id'));
    }

    public function findDoctorByDate($date)
    {
        $original_date = $date;
        $timestamp = strtotime($original_date);
        $new_date = date("d-m-Y", $timestamp);
        $date = $new_date;
        $doctors = Appointment::where('date',$date)->get();
        // dd($doctors);
        return $doctors;
    }

    public function store(Request $request)
    {
        date_default_timezone_set('Asia/Jakarta');

        $request->validate(['time'=>'required']);
        //Validasi jika user sudah melakukan booking di tanggal yang sama
        $check = $this->checkBookingTimeInterval($request->date);

        if($check){
            return redirect()->back()->with('errormessage','You already made an appointment in this date. Please wait to make next appointment');
        }
        //Create boooking to table
        booking::create([
            'user_id'=> auth()->user()->id,
            'doctor_id' => $request->doctorId,
            'time' => $request->time,
            'date' => $request->date,
            'status' => 0
        ]);

        Time::where('appointment_id',$request->appointmentId)
            ->where('time',$request->time)
            ->update(['status' => 1]);

        //Send email notification
        $doctorName = User::where('id',$request->doctorId)->first();
        $mailData =[
            'name' => auth()->user()->name,
            'time' => $request->time,
            'date' => $request->date,
            'doctorName' =>$doctorName->name,
            'image' =>$doctorName->image
        ];
        try {
            \Mail::to(auth()->user()->email)->send(new AppointmentMail($mailData));

        } catch(\Exception $e){

        }

            return redirect()->back()->with('message','Your Appointment was booked');
    }

    public function checkBookingTimeInterval($date){

        return booking::orderby('id','desc')
            ->where('user_id',auth()->user()->id)
            ->where('date',$date)
            ->exists();
    }

    public function mybooking()
    {
        $appointments = Booking::latest()->where('user_id',auth()->user()->id)->get();
        return view('booking.index',compact('appointments'));
    }

    public function doctorToday(Request $request){
        date_default_timezone_set('Asia/Jakarta');
        $doctors = Appointment::with('doctor')->where('date',date('d-m-Y'))->get();
        return $doctors;
    }

    public function findDoctors(Request $request)
    {
        $doctors = Appointment::with('doctor')->where('date',$request->date)->get();
        return $doctors;
    }

    public function myPrescription()
    {
        $prescriptions = Prescription::where('user_id',auth()->user()->id)->get();
        return view('my-prescription',compact('prescriptions'));
    }
}
