<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\prescription;

class PrescriptionController extends Controller
{
        public function index()
        {

            date_default_timezone_set('Asia/Jakarta');
            $bookings =  Booking::where('date',date('d-m-Y'))->where('status',1)->where('doctor_id',auth()->user()->id)->get();
            return view('prescription.index',compact('bookings'));
        }


        public function store(Request $request)
        {
            $data  = $request->all();
            $data['medicine'] = implode(',',$request->medicine);
            prescription::create($data);
            return redirect()->back()->with('message','Prescription created');
        }

        public function show($userId,$date)
        {
            $prescription = prescription::where('user_id',$userId)->where('date',$date)->first();
            return view('prescription.show',compact('prescription'));
        }

        //get all patients from prescription table
        public function patientsFromPrescription()
        {
            $patients = prescription::get();
            return view('prescription.all',compact('patients'));
        }
}
