@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">Your Appointment ({{$appointments->count()}})</div>

                <div class="card-body">
                    <table id="data_table" class="table">
                        <thead>
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Doctor</th>
                            <th scope="col">Date</th>
                            <th scope="col">Time</th>
                            <th scope="col">Ceated Date</th>
                            <th scope="col">Status</th>
                          </tr>
                        </thead>
                        <tbody>
                            @forelse ($appointments as $key=>$appointment)
                            <tr>
                                <th scope="row">{{$key+1}}</th>
                                <td>{{$appointment->doctor->name}}</td>
                                <td>{{$appointment->date}}</td>
                                <td>{{$appointment->time}}</td>
                                <td>{{$appointment->created_at}}</td>
                                <td>
                                    @if($appointment->status==0)
                                    <button class="btn btn-primary">Not Visited</button>
                                    @else
                                    <button class="btn btn-success">Checked</button>
                                    @endif
                                </td>
                              </tr>
                            @empty
                                <td>You Have</td>
                            @endforelse ( as )

                        </tbody>
                      </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
