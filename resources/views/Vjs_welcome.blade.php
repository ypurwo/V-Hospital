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
                    <h5>Steps to make a doctor's appointment</h5>
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
                                    <a href="#!"><h6>Step 1 : Select Date From Calendar</h6></a>
                                    <p class="text-muted mb-0">Choose the doctor you want and click button -> Book Appointment<a href="#!" class="text-blue"> More</a></p>
                                </div>
                            </div>
                            <div class="row pb-30">
                                <div class="col-auto text-right update-meta pr-0">
                                    <i class="b-primary update-icon ring"></i>
                                </div>
                                <div class="col pl-5">
                                    <a href="#!"><h6>Step 2 : Select Time for Appointment</h6></a>
                                    <p class="text-muted mb-0">Choose a clock from the available slots and click button -> Submit Appointment<a href="#!" class="text-blue"> More</a></p>
                                </div>
                            </div>
                            <div class="row pb-30">
                                <div class="col-auto text-right update-meta pr-0">
                                    <i class="b-success update-icon ring"></i>
                                </div>
                                <div class="col pl-5">
                                    <a href="#!"><h6>Step 3 : Check your email or whatsapp for booking information </h6></a>
                                    <p class="text-muted mb-0">For online video call consultation, Follow the payment instructions according to the instructions via email or whatsapp<a href="#!" class="text-green"> More</a></p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                @guest
                <div class="card-footer">
                    <div class="mt-5">
                        <a href="{{url('/register')}}"><button class="btn btn-success">Register as Patient</button></a>
                        <a href="{{url('/login')}}"><button class="btn btn-secondary">Login</button></a>
                    </div>
                </div>
                @endguest
            </div>
        </div>
    </div>

    <hr>
<!--date picker Component-->
<find-doctor></find-doctor>
<!--display doctors-->

</div>
@endsection