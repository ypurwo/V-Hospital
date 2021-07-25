@extends('admin.layouts.master')

@section('content')
<div class="container-fluid">
    <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                    <i class="ik ik-inbox bg-blue"></i>
                    <div class="d-inline">
                        <h5>Doctors</h5>
                        <span>Appointment time : {{Auth::user()->name}}</span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="../index.html"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Doctors</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">Appointment</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>


    <div class="row">
        <div class="col-md-12">
            @if(Session::has('message'))
            <div class="alert bg-success alert-success text-white">
                {{Session::get('message')}}
            </div>
        @endif
            <div class="card">
                <div class="card-header"><h3>Your Appointment time list : {{$myappointment->count()}}</h3></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <table table id="data_table" class="table">
                                <thead>
                                    <tr role="row">
                                        <th ></th>
                                        <th >Creator</th>
                                        <th >Date</th>
                                        <th class="nosort">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($myappointment)>0)
                                    @foreach($myappointment as $appointment)
                                    <tr>
                                        <td>#</td>
                                        <td>{{$appointment->doctor->name}}</td>
                                        <td>{{$appointment->date}}</td>
                                        <td>
                                            <div class="table-actions">
                                                <a href="#">
                                                    <input type="hidden" name="date" value="{{$appointment->date}}">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$appointment->id}}">
                                                    <i class="ik ik-eye"></i>
                                                    </button>
                                                </a>
                                                <a href="{{route('appointment.check')}}"><i class="ik ik-edit-2"></i></a>
                                                <a href="#"><i class="ik ik-trash-2"></i></a>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- View Modal -->
                                    @include('admin.appointment.modal')

                                    @endforeach
                                    @else
                                        <td>No Appointment Time to display</td>
                                    @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection