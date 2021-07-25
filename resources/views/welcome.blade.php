@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <img src="/banner/01.png" class="img-fluid">
        </div>
        <div class="col-md-6">
            <div class="card latest-update-card">
                <div class="card-header">
                    <h5>Create account & Book your appointment</h5>
                    <div class="card-header-right">
                        <ul class="list-unstyled card-option">
                            <li><i class="ik ik-chevron-left action-toggle"></i></li>
                            <li><i class="ik ik-minus minimize-card"></i></li>
                            <li><i class="ik ik-x close-card"></i></li>
                        </ul>
                    </div>
                </div>
                <div class="card-block">
                    <div class="scroll-widget">
                        <div class="latest-update-box">
                            <div class="row pt-20 pb-30">
                                <div class="col-auto text-right update-meta pr-0">
                                    <i class="b-primary update-icon ring"></i>
                                </div>
                                <div class="col pl-5">
                                    <a href="#!"><h6>Register or Login</h6></a>
                                    <p class="text-muted mb-0">Silahkan login atau buat account untuk melakukan booking appoinment dengan dokter
                                        Pilihan anda.<a href="#!" class="text-blue"> More</a></p>
                                </div>
                            </div>
                            <div class="row pb-30">
                                <div class="col-auto text-right update-meta pr-0">
                                    <i class="b-primary update-icon ring"></i>
                                </div>
                                <div class="col pl-5">
                                    <a href="#!"><h6>Book Appintment consultation Offline</h6></a>
                                    <p class="text-muted mb-0">Konsultasi Offline (datang bertmeu dokter secara langsung di rumah sakit)<a href="#!" class="text-blue"> More</a></p>
                                </div>
                            </div>
                            <div class="row pb-30">
                                <div class="col-auto text-right update-meta pr-0">
                                    <i class="b-success update-icon ring"></i>
                                </div>
                                <div class="col pl-5">
                                    <a href="#!"><h6>Book Appintment consultation Online</h6></a>
                                    <p class="text-muted mb-0">Konsultasi secara online zoom (video Call) <a href="#!" class="text-green"> More</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <div class="mt-5">
                        <a href="{{url('/register')}}"><button class="btn btn-success">Register as Patient</button></a>
                        <a href="{{url('/login')}}"><button class="btn btn-secondary">Login</button></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <hr>

    {{-- <form action="{{url('/')}}" method="GET">@csrf
    <div class="row">
        <div class="col-md-12">
            <div class="card"  style="min-height: 100px;">
                <div class="card-header"><h3>Find Doctors</h3></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12 col-xl-4 mb-30">
                            <input type="date" name="date" class="form-control" id="datepicker" value="<?php echo date('d-m-Y'); ?>">
                        </div>
                        <div class="col-sm-12 col-xl-4 mb-30">
                            <button class="btn btn-primary" type="submit"><i class="ik ik-search"></i>Find Doctors</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </form> --}}
<!--display doctors-->
    <div class="row">
        <div class="col-md-12">
            <div class="card">
                <form action="{{url('/')}}" method="GET">@csrf
                    <div class="card-header">
                        <div class="col-sm-12 col-xl-2 mb-30">
                        <h3>Find Doctors</h3>
                        </div>
                        <div class="col-sm-12 col-xl-4 mb-30">
                            <input type="date" name="date" class="form-control" id="datepicker" value="<?php echo date('d-m-Y'); ?>">
                        </div>
                        <div class="col-sm-12 col-xl-4 mb-30">
                            <button class="btn btn-primary" type="submit"><i class="ik ik-search"></i>Find Doctors</button>
                        </div>
                    </div>
                </form>
                <div class="card-body">
                    <table id="data_table" class="table">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Date</th>
                                <th class="nosort">Avatar</th>
                                <th>Name</th>
                                <th>Expertise</th>
                                <th>Book</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($doctors as $doctor)
                            <tr>
                                <td>001</td>
                                <td>{{$doctor->date}}</td>
                                <td><img src="{{asset('images')}}/{{$doctor->doctor->image}}" class="table-user-thumb" width="100" style="border-radius: 50%"></td>
                                <td>{{$doctor->doctor->name}}</td>
                                <td>{{$doctor->doctor->department}}</td>
                                <td>
                                    <a href="{{route('create.appointment',[$doctor->user_id,$doctor->date])}}"><button class="btn btn-success"><i class="ik ik-eye"></i>Book Appointment</button></a>
                                </td>
                            </tr>
                            @empty
                                <td>No Doctors Available today</td>
                            @endforelse

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection