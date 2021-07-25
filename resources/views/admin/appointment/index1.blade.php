@extends('admin.layouts.master')

@section('content')
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                 <i class="ik ik-edit bg-blue"></i>
                <div class="d-inline">
                    <h5>Doctors</h5>
                    <span>Create Appointment time</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="{{route('appointment.index')}}"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="{{route('appointment.index')}}">Doctor</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><a href="{{route('appointment.index')}}">Appointment</a></li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="container">
    @if(Session::has('message'))
        <div class="alert bg-success alert-success text-white">
            {{Session::get('message')}}
        </div>
    @endif
    @if(Session::has('errmessage'))
        <div class="alert bg-danger alert-success text-white">
            {{Session::get('errmessage')}}
        </div>
    @endif
    @foreach ($errors->all() as $error )
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
    {{-- <form action="{{route('appointment.check')}}" method="post">@csrf
        <div class="card">
            <div class="card-header">
                Choose Date
                <br>
                @if(isset($date)) Your timetable for: {{$date}} @endif
            </div>
            <div class="card-body">
                <input type="text" class="form-control datetimepicker-input" id="datepicker" data-toggle="datetimepicker" data-target="#datepicker" name="date">
                <br>
                <button type="submit" class="btn btn-primary">checked</button>
            </div>
        </div>
    </form> --}}
    @if(Route::is('appointment.check'))
    <form action="{{route('updateTime')}}" method="post">@csrf
        <div class="card">
            <div class="card-header">
                Choose AM Time
                <br>
                @if(isset($date)) Your timetable for: {{$date}} @endif
                    <span style="margin-left: 700px"> Check/Uncheck
                        <input type="checkbox" onclick=" for(c in document.getElementsByName('time[]')) document.getElementsByName('time[]').item(c).checked=this.checked">
                    </span>
            </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tbody>
                            <input type="hidden" name="appointmentId" value="{{$appointmentId}}">
                            <tr>
                            <th scope="row">1</th>
                            <td><input type="checkbox" name="time[]" value="8.00am" @if(isset($times)){{$times->contains('time','8.00am')? 'checked':''}}@endif> 8.00am</td>
                            <td><input type="checkbox" name="time[]" value="8.15am" @if(isset($times)){{$times->contains('time','8.15am')? 'checked':''}}@endif> 8.15am</td>
                            <td><input type="checkbox" name="time[]" value="8.30am" @if(isset($times)){{$times->contains('time','8.30am')? 'checked':''}}@endif> 8.30am</td>
                            <td><input type="checkbox" name="time[]" value="8.45am" @if(isset($times)){{$times->contains('time','8.45am')? 'checked':''}}@endif> 8.45am</td>
                            </tr>
                            <tr>
                            <th scope="row">2</th>
                            <td><input type="checkbox" name="time[]" value="9.00am" @if(isset($times)){{$times->contains('time','9.00am')? 'checked':''}}@endif> 9.00am</td>
                            <td><input type="checkbox" name="time[]" value="9.15am" @if(isset($times)){{$times->contains('time','9.15am')? 'checked':''}}@endif> 9.15am</td>
                            <td><input type="checkbox" name="time[]" value="9.30am" @if(isset($times)){{$times->contains('time','9.30am')? 'checked':''}}@endif> 9.30am</td>
                            <td><input type="checkbox" name="time[]" value="9.45am" @if(isset($times)){{$times->contains('time','9.45am')? 'checked':''}}@endif> 9.45am</td>
                            </tr>
                            <tr>
                            <th scope="row">3</th>
                            <td><input type="checkbox" name="time[]" value="10.00am" @if(isset($times)){{$times->contains('time','10.00am')? 'checked':''}}@endif> 10.00am</td>
                            <td><input type="checkbox" name="time[]" value="10.15am" @if(isset($times)){{$times->contains('time','10.15am')? 'checked':''}}@endif> 10.15am</td>
                            <td><input type="checkbox" name="time[]" value="10.30am" @if(isset($times)){{$times->contains('time','10.30am')? 'checked':''}}@endif> 10.30am</td>
                            <td><input type="checkbox" name="time[]" value="10.45am" @if(isset($times)){{$times->contains('time','10.45am')? 'checked':''}}@endif> 10.45am</td>
                            </tr>
                            <tr>
                            <th scope="row">4</th>
                            <td><input type="checkbox" name="time[]" value="11.00am" @if(isset($times)){{$times->contains('time','11.00am')? 'checked':''}}@endif> 11.00am</td>
                            <td><input type="checkbox" name="time[]" value="11.15am" @if(isset($times)){{$times->contains('time','11.15am')? 'checked':''}}@endif> 11.15am</td>
                            <td><input type="checkbox" name="time[]" value="11.30am" @if(isset($times)){{$times->contains('time','11.30am')? 'checked':''}}@endif> 11.30am</td>
                            <td><input type="checkbox" name="time[]" value="11.45am" @if(isset($times)){{$times->contains('time','11.45am')? 'checked':''}}@endif> 11.45am</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
        </div>
            <div class="card">
                <div class="card-header">
                    Choose PM Time
                    <br>
                    @if(isset($date)) Your timetable for: {{$date}} @endif
                </div>
                <div class="card-body">
                    <table class="table table-striped">
                        <tbody>
                            <tr>
                            <th scope="row">5</th>
                            <td><input type="checkbox" name="time[]" value="12.00pm" @if(isset($times)){{$times->contains('time','12.00pm')? 'checked':''}}@endif> 12.00pm</td>
                            <td><input type="checkbox" name="time[]" value="12.15pm" @if(isset($times)){{$times->contains('time','12.15pm')? 'checked':''}}@endif> 12.15pm</td>
                            <td><input type="checkbox" name="time[]" value="12.30pm" @if(isset($times)){{$times->contains('time','12.30pm')? 'checked':''}}@endif> 12.30pm</td>
                            <td><input type="checkbox" name="time[]" value="12.45pm" @if(isset($times)){{$times->contains('time','12.45pm')? 'checked':''}}@endif> 12.45pm</td>
                            </tr>
                            <tr>
                            <th scope="row">6</th>
                            <td><input type="checkbox" name="time[]" value="13.00pm" @if(isset($times)){{$times->contains('time','13.00pm')? 'checked':''}}@endif> 13.00pm</td>
                            <td><input type="checkbox" name="time[]" value="13.15pm" @if(isset($times)){{$times->contains('time','13.15pm')? 'checked':''}}@endif> 13.15pm</td>
                            <td><input type="checkbox" name="time[]" value="13.30pm" @if(isset($times)){{$times->contains('time','13.30pm')? 'checked':''}}@endif> 13.30pm</td>
                            <td><input type="checkbox" name="time[]" value="13.45pm" @if(isset($times)){{$times->contains('time','13.45pm')? 'checked':''}}@endif> 13.45pm</td>
                            </tr>
                            <tr>
                            <th scope="row">7</th>
                            <td><input type="checkbox" name="time[]" value="14.00pm" @if(isset($times)){{$times->contains('time','14.00pm')? 'checked':''}}@endif> 14.00pm</td>
                            <td><input type="checkbox" name="time[]" value="14.15pm" @if(isset($times)){{$times->contains('time','14.15pm')? 'checked':''}}@endif> 14.15pm</td>
                            <td><input type="checkbox" name="time[]" value="14.30pm" @if(isset($times)){{$times->contains('time','14.30pm')? 'checked':''}}@endif> 14.30pm</td>
                            <td><input type="checkbox" name="time[]" value="14.45pm" @if(isset($times)){{$times->contains('time','14.45pm')? 'checked':''}}@endif> 14.45pm</td>
                            </tr>
                            <tr>
                            <th scope="row">8</th>
                            <td><input type="checkbox" name="time[]" value="15.00pm" @if(isset($times)){{$times->contains('time','15.00pm')? 'checked':''}}@endif> 15.00pm</td>
                            <td><input type="checkbox" name="time[]" value="15.15pm" @if(isset($times)){{$times->contains('time','15.15pm')? 'checked':''}}@endif> 15.15pm</td>
                            <td><input type="checkbox" name="time[]" value="15.30pm" @if(isset($times)){{$times->contains('time','15.30pm')? 'checked':''}}@endif> 15.30pm</td>
                            <td><input type="checkbox" name="time[]" value="15.45pm" @if(isset($times)){{$times->contains('time','15.45pm')? 'checked':''}}@endif> 15.45pm</td>
                            </tr>
                            <tr>
                            <th scope="row">9</th>
                            <td><input type="checkbox" name="time[]" value="16.00pm" @if(isset($times)){{$times->contains('time','16.00pm')? 'checked':''}}@endif> 16.00pm</td>
                            <td><input type="checkbox" name="time[]" value="16.15pm" @if(isset($times)){{$times->contains('time','16.15pm')? 'checked':''}}@endif> 16.15pm</td>
                            <td><input type="checkbox" name="time[]" value="16.30pm" @if(isset($times)){{$times->contains('time','16.30pm')? 'checked':''}}@endif> 16.30pm</td>
                            <td><input type="checkbox" name="time[]" value="16.45pm" @if(isset($times)){{$times->contains('time','16.45pm')? 'checked':''}}@endif> 16.45pm</td>
                            </tr>
                            <tr>
                            <th scope="row">10</th>
                            <td><input type="checkbox" name="time[]" value="17.00pm" @if(isset($times)){{$times->contains('time','17.00pm')? 'checked':''}}@endif> 17.00pm</td>
                            <td><input type="checkbox" name="time[]" value="17.15pm" @if(isset($times)){{$times->contains('time','17.15pm')? 'checked':''}}@endif> 17.15pm</td>
                            <td><input type="checkbox" name="time[]" value="17.30pm" @if(isset($times)){{$times->contains('time','17.30pm')? 'checked':''}}@endif> 17.30pm</td>
                            <td><input type="checkbox" name="time[]" value="17.45pm" @if(isset($times)){{$times->contains('time','17.45pm')? 'checked':''}}@endif> 17.45pm</td>
                            </tr>
                            <tr>
                            <th scope="row">11</th>
                            <td><input type="checkbox" name="time[]" value="18.00pm" @if(isset($times)){{$times->contains('time','18.00pm')? 'checked':''}}@endif> 18.00pm</td>
                            <td><input type="checkbox" name="time[]" value="18.15pm" @if(isset($times)){{$times->contains('time','18.15pm')? 'checked':''}}@endif> 18.15pm</td>
                            <td><input type="checkbox" name="time[]" value="18.30pm" @if(isset($times)){{$times->contains('time','18.30pm')? 'checked':''}}@endif> 18.30pm</td>
                            <td><input type="checkbox" name="time[]" value="18.45pm" @if(isset($times)){{$times->contains('time','18.45pm')? 'checked':''}}@endif> 18.45pm</td>
                            </tr>
                            <tr>
                            <th scope="row">12</th>
                            <td><input type="checkbox" name="time[]" value="19.00pm" @if(isset($times)){{$times->contains('time','19.00pm')? 'checked':''}}@endif> 19.00pm</td>
                            <td><input type="checkbox" name="time[]" value="19.15pm" @if(isset($times)){{$times->contains('time','19.15pm')? 'checked':''}}@endif> 19.15pm</td>
                            <td><input type="checkbox" name="time[]" value="19.30pm" @if(isset($times)){{$times->contains('time','19.30pm')? 'checked':''}}@endif> 19.30pm</td>
                            <td><input type="checkbox" name="time[]" value="19.45pm" @if(isset($times)){{$times->contains('time','19.45pm')? 'checked':''}}@endif> 19.45pm</td>
                            </tr>
                            <tr>
                            <th scope="row">13</th>
                            <td><input type="checkbox" name="time[]" value="20.00pm" @if(isset($times)){{$times->contains('time','20.00pm')? 'checked':''}}@endif> 20.00pm</td>
                            <td><input type="checkbox" name="time[]" value="20.15pm" @if(isset($times)){{$times->contains('time','20.15pm')? 'checked':''}}@endif> 20.15pm</td>
                            <td><input type="checkbox" name="time[]" value="20.30pm" @if(isset($times)){{$times->contains('time','20.30pm')? 'checked':''}}@endif> 20.30pm</td>
                            <td><input type="checkbox" name="time[]" value="20.45pm" @if(isset($times)){{$times->contains('time','20.45pm')? 'checked':''}}@endif> 20.45pm</td>
                            </tr>
                            <tr>
                            <th scope="row">14</th>
                            <td><input type="checkbox" name="time[]" value="21.00pm" @if(isset($times)){{$times->contains('time','21.00pm')? 'checked':''}}@endif> 21.00pm</td>
                            <td><input type="checkbox" name="time[]" value="21.15pm" @if(isset($times)){{$times->contains('time','21.15pm')? 'checked':''}}@endif> 21.15pm</td>
                            <td><input type="checkbox" name="time[]" value="21.30pm" @if(isset($times)){{$times->contains('time','21.30pm')? 'checked':''}}@endif> 21.30pm</td>
                            <td><input type="checkbox" name="time[]" value="21.45pm" @if(isset($times)){{$times->contains('time','21.45pm')? 'checked':''}}@endif> 21.45pm</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>

                <div class="card">
                    <div class="card-body">
                        <button type="submite" class="btn btn-primary">Submite</button>
                    </div>
                </div>
    </form>

    @else
        <h3>Your Appointment time list</h3>

            <table class="table table-striped">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Creator</th>
                    <th scope="col">Date</th>
                    <th scope="col">View/Update</th>
                </tr>
                </thead>
                <tbody>
                @foreach ($myappointment as $appointment)
                    <tr>
                        <th scope="row"></th>
                        <td>{{$appointment->doctor->name}}</td>
                        <td>{{$appointment->date}}</td>
                        <td>
                            <form action="{{route('appointment.check')}}" method="post">@csrf
                                <input type="hidden" name="date" value="{{$appointment->date}}">
                                <button type="submit" class="btn btn-primary">View/Update</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

    @endif

</div>

@endsection