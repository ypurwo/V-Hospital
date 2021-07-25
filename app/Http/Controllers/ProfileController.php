<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\User;


class ProfileController extends Controller
{
    public function index()
    {
        // dd(auth()->user()->name);
        return view('profile.index');
    }

    public function store(Request $request)
    {
        // dd($request->all());
        $this->validate($request,[
            'name' => 'required',
            'address' => 'required',
            'phone_number' => 'required',
            'gender' => 'required'
        ]);
        // Update table User
        User::where('id',auth()->user()->id)->update($request->except('token'));
                // ->update([
                //     'name' => $request->name,
                //     'address' => $request->address,
                //     'phone_number' => $request->phone_number,
                //     'gender' => $request->gender,
                //     'description' => $request->description
                // ]);
        return redirect()->back()->with('message','Profile Updated Successfully');
    }

    public function profileImage(Request $request)
    {

        $this->validate($request,['file'=>'required|mimes:jpeg,jpg,png']);
        $data = $request->all();
        $user = User::find(auth()->user()->id);

        if($request->hasFile('file')){
            $imageName=(new User)->profilePic($request);
            if(!empty($user->image)){
                unlink(public_path('images/profile/'.$user->image));
            }
        }
        //Tambahkan collection image kedalam variabel $data
        $data['image'] = $imageName;

        $user->update($data);
        return redirect()->back()->with('message','Profile Image Updated Successfully');

    }
}
