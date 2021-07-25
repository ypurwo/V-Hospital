@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-3">
            <div class="card">
                <div class="card-body text-center">
                    <div class="profile-pic mb-20">
                        <img src="{{asset('images')}}/{{$appointment->doctor->image}}" width="150" class="rounded-circle" alt="user">
                    </div>
                    <div>
                        <h4 class="badge badge-pill badge-warning">{{$appointment->doctor->role->name}}</h4>
                        <h4 class="mt-20 mb-0">{{$appointment->doctor->name}}</h4>
                        <a href="#" >{{$appointment->doctor->education}}</a>
                    </div>
                    <h3 class="badge badge-pill badge-dark">{{$appointment->doctor->department}}</h3>
                </div>
                <div class="p-4 border-top mt-15">
                    <div class="row text-center">
                        <div class="col-6 border-right">
                            <a href="#" class="link d-flex align-items-center justify-content-center"><i class="ik ik-message-square f-20 mr-2"></i>Message</a>
                        </div>
                        <div class="col-6">
                            <a href="#" class="link d-flex align-items-center justify-content-center"><i class="ik ik-box f-20 mr-2"></i>Portfolio</a>
                        </div>
                    </div>
                </div>

            </div>
        </div>
        <div class="col-md-9">
            <!-- menampilkan error aller jika tanggal kosong -->
            @foreach ($errors->all() as $error )
                <div class="alert alert-danger">
                    {{$error}}
                </div>
            @endforeach
            <!-- menampilkan pesan jika booking berhasil -->
            @if (Session::has('message'))
                <div class="alert alert-success">
                    {{Session::get('message')}}
                </div>
            @endif
            <!-- menampilkan pesan jika booking berhasil -->
            @if (Session::has('errormessage'))
                <div class="alert alert-danger">
                    {{Session::get('errormessage')}}
                </div>
            @endif

            <form action="{{route('booking.appointment')}}" method="post">@csrf
                <div class="card">
                    <div class="card-header">Book Appointment Time for : {{$date}}</div>
                    <div class="card-body">
                        <div class="row">
                            @foreach ($times as $time )
                            <div class="col-md-3">
                                <label class="btn btn-outline-primary">
                                    <input type="radio" name="time" value="{{$time->time}}">
                                    <span>{{$time->time}}</span>
                                </label>
                            </div>
                            <input type="hidden" name="doctorId" value="{{$doctor_id}}">
                            <input type="hidden" name="appointmentId" value="{{$time->appointment_id}}">
                            <input type="hidden" name="date" value="{{$date}}">
                            @endforeach
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    @if(Auth::check())
                    <button type="submit" class="btn btn-success" style="width: 100%;">Submit Appointment</button>
                    @else
                        <p>Please Login to make an appointment</p>
                        <a href="/register">Register</a>
                        <a href="/login">Login</a>
                    @endif
                </div>
            </form>
        </div>
    </div>
</div>
@endsection