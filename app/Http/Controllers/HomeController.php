<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(Auth::user()->role->name=="admin"||Auth::user()->role->name=="doctor"){
            return redirect()->to('/dashboard');
        }
        return view('home');
    }

    public function profile()
    {
        $user = User::find(Auth::user()->id);
        // dd($user);
        return view('admin.doctor.profile',compact('user'));
    }
}
