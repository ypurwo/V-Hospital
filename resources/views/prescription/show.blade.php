@extends('admin.layouts.master')
@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

              <div class="card-header" >
                <a href="{{route('patients.today')}}"><button class="btn btn-primary"> List Patient</button></a>
                </div>

                <div class="card-body">
                    <p>Date:{{$prescription->date}}</p>
                    <p>Patient:{{$prescription->user->name}}</p>
                    <p>Doctor:{{$prescription->doctor->name}}</p>
                    <p>Disease:{{$prescription->name_of_disease}}</p>
                    <p>Symptoms:{{$prescription->symptoms}}</p>
                    <p>Medicine:{{$prescription->medicine}}</p>
                    <p>Proedure to use medicine:{{$prescription->procedure_to_use_medicine}}</p>
                    <p>Feedback:{{$prescription->feedback}}</p>
                    <p>Doctor signature:{{$prescription->signature}}</p>


                </div>
            </div>
        </div>
    </div>
</div>

@endsection
