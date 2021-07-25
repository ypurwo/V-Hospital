<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Booking;
use App\Models\prescription;
use App\Models\User;
use Auth;

class EmrPoliclinicController extends Controller
{
    public function index()
    {
        date_default_timezone_set('Asia/Jakarta');
        $user = User::find(Auth::user()->id);
        // $bookings =  Booking::where('date',date('d-m-Y'))->where('status',1)->where('doctor_id',auth()->user()->id)->get();
        // dd($user);
        return view('emr.Poli_clinik.index',compact('user'));
    }
}
