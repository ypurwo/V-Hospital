@extends('admin.layouts.master')

@section('content')
<div class="page-header">
    <div class="row align-items-end">
        <div class="col-lg-8">
            <div class="page-header-title">
                 <i class="ik ik-edit bg-blue"></i>
                <div class="d-inline">
                    <h5>Doctors</h5>
                    <span>Delete Doctor</span>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <nav class="breadcrumb-container" aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item">
                        <a href="../index.html"><i class="ik ik-home"></i></a>
                    </li>
                    <li class="breadcrumb-item"><a href="#">Doctor</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Create</li>
                </ol>
            </nav>
        </div>
    </div>
</div>

<div class="row justify-content-center">
    <div class="col-lg-10">
        @if(Session::has('message'))
            <div class="alert bg-success alert-success text-white">
                {{Session::get('message')}}
            </div>
        @endif
        <div class="card">
            <div class="card-header"><h3>Confirm Delete Doctor</h3></div>
            <div class="card-body">
                <img src="{{asset('images')}}/{{$user->image}}" width="100">
                <h2>{{$user->name}}</h2>
                <form class="forms-sample" action="{{route('doctor.destroy',[$user->id])}}" method="post" >@csrf
                    @method('DELETE')

                    <button type="submit" class="btn btn-danger mr-2">Delete</button>
                    <a href="{{route('doctor.index')}}" class="btn btn-secondary">Cancel</a>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
