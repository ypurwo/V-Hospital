<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\User;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // dd(\Auth::user()->role->name);
        $users = User::where('role_id','=','1')->get();
        return view('admin.doctor.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.doctor.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->all());
        $this->validationStore($request);
        $data = $request->all();
        // $image = $request->file('image');
        // $name = $image->hashName();
        // $destinantion = public_path('/images');
        // $image->move($destinantion,$name);
        $name = (new User)->userAvatar($request);

        $data['image'] = $name;
        $data['password'] = bcrypt($request->password);
        User::create($data);

        return redirect()->back()->with('message','Doctor added successfuly');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('admin.doctor.delete',compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        // dd($user);
        return view('admin.doctor.edit',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validationUpdate($request,$id);
        $data = $request->all();
        $user = User::find($id);
        $imageName = $user->image;
        $userPassword = $user->password;
        if($request->hasFile('image')){
            // $image = $request->file('image');
            // $imageName = $image->hashName();
            // $destinantion = public_path('/images');
            // $image->move($destinantion,$imageName);
            $imageName=(new User)->userAvatar($request);
            unlink(public_path('images/'.$user->image));
        }
        //Menambahkan colection image kedalam variabel $data
        $data['image'] =$imageName;
        if($request->password){
            $data['password'] = bcrypt($request->password);
        }else{
            $data['password'] = $userPassword;
        }

        $user->update($data);
        return redirect()->route('doctor.index')->with('message','Doctor Update Successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(auth()->user()->id == $id){
            abort(401);
        }
        $user = User::find($id);
        $userDelete = $user->delete();
        if($userDelete){
            unlink(public_path('images/'.$user->image));
        }
        return redirect()->route('doctor.index')->with('message','Doctor Deleted Successfully');
    }

    //validasi data doctor
    public function validationStore($request){
        Return $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users',
            'password'=>'required|min:6|max:25',
            'gender'=>'required',
            'education'=>'required',
            'address'=>'required',
            'department'=>'required',
            'phone_number'=>'required|numeric',
            'image'=>'required|mimes:jpeg,jpg,png',
            'role_id'=>'required',
            'description'=>'required'
            ]);
    }

    public function validationUpdate($request,$id){
        Return $this->validate($request,[
            'name'=>'required',
            'email'=>'required|unique:users,email,'.$id,
            'gender'=>'required',
            'education'=>'required',
            'address'=>'required',
            'department'=>'required',
            'phone_number'=>'required|numeric',
            'role_id'=>'required',
            'description'=>'required'
            ]);
    }

}
