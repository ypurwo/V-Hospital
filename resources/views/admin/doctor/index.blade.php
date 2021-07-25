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
                        <span>List of all doctors</span>
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
                        <li class="breadcrumb-item active" aria-current="page">Index</li>
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
                <div class="card-header"><h3>Data Doctors</h3></div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-sm-12">
                            <table table id="data_table" class="table">
                                <thead>
                                    <tr role="row">
                                        <th >Name</th>
                                        <th class="nosort">Avatar</th>
                                        <th >Email</th>
                                        <th >Address</th>
                                        <th >Phone Number</th>
                                        <th class="nosort">&nbsp;</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @if(count($users)>0)
                                    @foreach($users as $user)
                                    <tr>
                                        <td>{{$user->name}}</td>
                                        <td><img src="{{asset('images')}}/{{$user->image}}" class="table-user-thumb" alt=""></td>
                                        <td>{{$user->email}}</td>
                                        <td>{{$user->address}}</td>
                                        <td>{{$user->phone_number}}</td>
                                        <td>
                                            <div class="table-actions">
                                                <a href="#">
                                                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$user->id}}">
                                                    <i class="ik ik-eye"></i>
                                                    </button>
                                                </a>
                                                <a href="{{route('doctor.edit',[$user->id])}}"><i class="ik ik-edit-2"></i></a>
                                                <a href="{{route('doctor.show',[$user->id])}}"><i class="ik ik-trash-2"></i></a>
                                            </div>
                                        </td>
                                    </tr>

                                    <!-- View Modal -->
                                    @include('admin.doctor.modal')

                                    @endforeach
                                    @else
                                        <td>No Users to display</td>
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