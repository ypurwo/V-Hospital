@extends('admin.layouts.master')
@section('content')
<div class="container">
    <div class="page-header">
      <div class="row align-items-end">
          <div class="col-lg-8">
              <div class="page-header-title">
                  <i class="ik ik-edit bg-blue"></i>
                  <div class="d-inline">
                      <h5>Patient Today</h5>
                      <span class="badge badge-pill badge-success">List of Appointment Today
                        <span class="badge badge-pill badge-light">( {{$bookings->count()}} )</span>
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
                      <li class="breadcrumb-item"><a href="#">Patient Today</a></li>
                      <li class="breadcrumb-item active" aria-current="page">List Patient Today</li>
                  </ol>
              </nav>
          </div>
      </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
              @if(Session::has('message'))
              <div class="alert alert-success">
                  {{Session::get('message')}}
              </div>
              @endif
              {{-- <div class="card-header" >

                     Appointment ({{$bookings->count()}})
                 </div> --}}

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
                        @forelse($bookings as $key=>$booking)
                        <tr>
                          <th scope="row">{{$key+1}}</th>
                          <td><img src="/images/profile/{{$booking->user->image}}" width="80" style="border-radius: 50%;">
                          </td>
                          <td>
                             {{$booking->date}}
                          </td>
                          <td>{{$booking->user->name}}</td>
                          <td>{{$booking->user->email}}</td>
                          <td>{{$booking->user->phone_number}}</td>
                          <td>{{$booking->user->gender}}</td>
                          <td>{{$booking->time}}</td>
                          <td>{{$booking->doctor->name}}</td>
                          <td>
                            @if($booking->status==1)
                             checked
                             @endif
                          </td>
                          <td>
                              <!-- Button trigger modal -->
                            @if(!App\Models\prescription::where('date',date('d-m-Y'))->where('doctor_id',auth()->user()->id)->where('user_id',$booking->user->id)->exists())
                              <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal{{$booking->user_id}}">
                              Write prescription
                              </button>
                              @include('prescription.form')

                              @else
                            <a href="{{route('prescription.show',[$booking->user_id,$booking->date])}}" class="btn btn-secondary">View prescription</a>
                              @endif
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
        <script src="{{ asset('js/app.js') }}"defer></script>


@endsection
