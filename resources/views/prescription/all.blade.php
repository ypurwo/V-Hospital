@extends('admin.layouts.master')
@section('content')
<div class="container">
      <div class="page-header">
        <div class="row align-items-end">
            <div class="col-lg-8">
                <div class="page-header-title">
                  <a href="{{route('patients.today')}}"><i class="ik ik-home bg-blue"></a></i>
                    <div class="d-inline">
                        <h5>Patient File</h5>
                        <span class="badge badge-pill badge-success">Patient medical record File
                          <span class="badge badge-pill badge-light">
                            ({{$patients->count()}})
                        </span>
                    </div>
                </div>
            </div>
            <div class="col-lg-4">
                <nav class="breadcrumb-container" aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="{{route('patients.today')}}"><i class="ik ik-home"></i></a>
                        </li>
                        <li class="breadcrumb-item"><a href="#">Patient File</a></li>
                        <li class="breadcrumb-item active" aria-current="page">List</li>
                    </ol>
                </nav>
            </div>
        </div>
      </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">

              <div class="card-header" >

                     Appointment ({{$patients->count()}})
                 </div>

                <div class="card-body">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th scope="col">#</th>
                          <th scope="col">Photo</th>
                          <th scope="col">Date</th>
                          <th scope="col">User</th>
                          <th scope="col">Email</th>
                          <th scope="col">Phone</th>
                          <th scope="col">Gender</th>
                          <th scope="col">Time</th>
                          <th scope="col">Doctor</th>
                          <th scope="col">Status</th>
                          <th scope="col">Prescription</th>
                          <th scope="col">EMR</th>
                        </tr>
                      </thead>
                      <tbody>
                        @forelse($patients as $key=>$patient)
                        <tr>
                          <th scope="row">{{$key+1}}</th>
                          <td><img src="/images/profile/{{$patient->user->image}}" width="80" style="border-radius: 50%;">
                          </td>
                          <td></td>
                          <td>{{$patient->user->name}}</td>
                          <td>{{$patient->user->email}}</td>
                          <td>{{$patient->user->phone_number}}</td>
                          <td>{{$patient->user->gender}}</td>
                          <td>{{$patient->time}}</td>
                          <td>{{$patient->doctor->name}}</td>
                          <td>
                            @if($patient->status==1)
                             checked
                             @endif
                          </td>
                          <td>
                              <!-- Button trigger modal -->
                              <a href="{{route('prescription.show',[$patient->user_id,$patient->date])}}" class="btn btn-secondary">View prescription</a>
                          </td>
                          <td>
                              <a href="{{route('emr.policlinic')}}" class="btn btn-primary">EMR</a>
                          </td>
                        </tr>
                        @empty
                        <td>There is no any appointments !</td>
                        @endforelse

                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
