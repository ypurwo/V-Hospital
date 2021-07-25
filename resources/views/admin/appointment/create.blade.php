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
    @foreach ($errors->all() as $error )
        <div class="alert alert-danger">
            {{$error}}
        </div>
    @endforeach
    <form action="{{route('appointment.store')}}" method="post">@csrf
        <div class="card">
            <div class="card-header">
                Choose Date
            </div>
            <div class="card-body">
                <input type="text" autocomplete="off" class="form-control datetimepicker-input" id="datepicker" data-toggle="datetimepicker" data-target="#datepicker" name="date" >
            </div>
        </div>

        <div class="card">
            <div class="card-header">
                Choose AM Time
                    <span style="margin-left: 700px"> Check/Uncheck
                        <input type="checkbox" onclick=" for(c in document.getElementsByName('time[]')) document.getElementsByName('time[]').item(c).checked=this.checked">
                    </span>
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                        <th scope="row">1</th>
                        <td><input type="checkbox" name="time[]" value="8.00am"> 8.00am</td>
                        <td><input type="checkbox" name="time[]" value="8.15am"> 8.15am</td>
                        <td><input type="checkbox" name="time[]" value="8.30am"> 8.30am</td>
                        <td><input type="checkbox" name="time[]" value="8.45am"> 8.45am</td>
                        </tr>
                        <tr>
                        <th scope="row">2</th>
                        <td><input type="checkbox" name="time[]" value="9.00am"> 9.00am</td>
                        <td><input type="checkbox" name="time[]" value="9.15am"> 9.15am</td>
                        <td><input type="checkbox" name="time[]" value="9.30am"> 9.30am</td>
                        <td><input type="checkbox" name="time[]" value="9.45am"> 9.45am</td>
                        </tr>
                        <tr>
                        <th scope="row">3</th>
                        <td><input type="checkbox" name="time[]" value="10.00am"> 10.00am</td>
                        <td><input type="checkbox" name="time[]" value="10.15am"> 10.15am</td>
                        <td><input type="checkbox" name="time[]" value="10.30am"> 10.30am</td>
                        <td><input type="checkbox" name="time[]" value="10.45am"> 10.45am</td>
                        </tr>
                        <tr>
                        <th scope="row">4</th>
                        <td><input type="checkbox" name="time[]" value="11.00am"> 11.00am</td>
                        <td><input type="checkbox" name="time[]" value="11.15am"> 11.15am</td>
                        <td><input type="checkbox" name="time[]" value="11.30am"> 11.30am</td>
                        <td><input type="checkbox" name="time[]" value="11.45am"> 11.45am</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
        <div class="card">
            <div class="card-header">
                Choose PM Time
            </div>
            <div class="card-body">
                <table class="table table-striped">
                    <tbody>
                        <tr>
                        <th scope="row">5</th>
                        <td><input type="checkbox" name="time[]" value="12.00pm"> 12.00pm</td>
                        <td><input type="checkbox" name="time[]" value="12.15pm"> 12.15pm</td>
                        <td><input type="checkbox" name="time[]" value="12.30pm"> 12.30pm</td>
                        <td><input type="checkbox" name="time[]" value="12.45pm"> 12.45pm</td>
                        </tr>
                        <tr>
                        <th scope="row">6</th>
                        <td><input type="checkbox" name="time[]" value="13.00pm"> 13.00pm</td>
                        <td><input type="checkbox" name="time[]" value="13.15pm"> 13.15pm</td>
                        <td><input type="checkbox" name="time[]" value="13.30pm"> 13.30pm</td>
                        <td><input type="checkbox" name="time[]" value="13.45pm"> 13.45pm</td>
                        </tr>
                        <tr>
                        <th scope="row">7</th>
                        <td><input type="checkbox" name="time[]" value="14.00pm"> 14.00pm</td>
                        <td><input type="checkbox" name="time[]" value="14.15pm"> 14.15pm</td>
                        <td><input type="checkbox" name="time[]" value="14.30pm"> 14.30pm</td>
                        <td><input type="checkbox" name="time[]" value="14.45pm"> 14.45pm</td>
                        </tr>
                        <tr>
                        <th scope="row">8</th>
                        <td><input type="checkbox" name="time[]" value="15.00pm"> 15.00pm</td>
                        <td><input type="checkbox" name="time[]" value="15.15pm"> 15.15pm</td>
                        <td><input type="checkbox" name="time[]" value="15.30pm"> 15.30pm</td>
                        <td><input type="checkbox" name="time[]" value="15.45pm"> 15.45pm</td>
                        </tr>
                        <tr>
                        <th scope="row">9</th>
                        <td><input type="checkbox" name="time[]" value="16.00pm"> 16.00pm</td>
                        <td><input type="checkbox" name="time[]" value="16.15pm"> 16.15pm</td>
                        <td><input type="checkbox" name="time[]" value="16.30pm"> 16.30pm</td>
                        <td><input type="checkbox" name="time[]" value="16.45pm"> 16.45pm</td>
                        </tr>
                        <tr>
                        <th scope="row">10</th>
                        <td><input type="checkbox" name="time[]" value="17.00pm"> 17.00pm</td>
                        <td><input type="checkbox" name="time[]" value="17.15pm"> 17.15pm</td>
                        <td><input type="checkbox" name="time[]" value="17.30pm"> 17.30pm</td>
                        <td><input type="checkbox" name="time[]" value="17.45pm"> 17.45pm</td>
                        </tr>
                        <tr>
                        <th scope="row">11</th>
                        <td><input type="checkbox" name="time[]" value="18.00pm"> 18.00pm</td>
                        <td><input type="checkbox" name="time[]" value="18.15pm"> 18.15pm</td>
                        <td><input type="checkbox" name="time[]" value="18.30pm"> 18.30pm</td>
                        <td><input type="checkbox" name="time[]" value="18.45pm"> 18.45pm</td>
                        </tr>
                        <tr>
                        <th scope="row">12</th>
                        <td><input type="checkbox" name="time[]" value="19.00pm"> 19.00pm</td>
                        <td><input type="checkbox" name="time[]" value="19.15pm"> 19.15pm</td>
                        <td><input type="checkbox" name="time[]" value="19.30pm"> 19.30pm</td>
                        <td><input type="checkbox" name="time[]" value="19.45pm"> 19.45pm</td>
                        </tr>
                        <tr>
                        <th scope="row">13</th>
                        <td><input type="checkbox" name="time[]" value="20.00pm"> 20.00pm</td>
                        <td><input type="checkbox" name="time[]" value="20.15pm"> 20.15pm</td>
                        <td><input type="checkbox" name="time[]" value="20.30pm"> 20.30pm</td>
                        <td><input type="checkbox" name="time[]" value="20.45pm"> 20.45pm</td>
                        </tr>
                        <tr>
                        <th scope="row">14</th>
                        <td><input type="checkbox" name="time[]" value="21.00pm"> 21.00pm</td>
                        <td><input type="checkbox" name="time[]" value="21.15pm"> 21.15pm</td>
                        <td><input type="checkbox" name="time[]" value="21.30pm"> 21.30pm</td>
                        <td><input type="checkbox" name="time[]" value="21.45pm"> 21.45pm</td>
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
</div>

<!-- <style type="text/css">
    input[type="checkbox"]{
        zoom:1.3;
    }
    body{
        font-size: 15px;
    }
</style> -->
@endsection