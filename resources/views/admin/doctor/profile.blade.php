@extends('admin.layouts.master')

@section('content')

    <h5>Profile Dokter </h5>
    <div class="card">
        <div class="card-body">
            <div class="text-center">
                <img src="{{asset('images')}}/{{$user->image}}" class="rounded-circle" width="125">
                <h4 class="card-title mt-10">{{$user->name}} ( {{$user->gender}} )</h4>
                <p class="badge badge-pill badge-info">{{$user->department}} ( {{$user->education}} )</p>
                <p class="badge badge-pill badge-dark">role:{{$user->role->name}}</p>
                <div class="row text-center justify-content-md-center">
                    <div class="col-4"><a href="javascript:void(0)" class="link"><i class="ik ik-user"></i> <font class="font-medium">{{$user->id}}</font></a></div>
                    <div class="col-4"><a href="javascript:void(0)" class="link"><i class="ik ik-image"></i> <font class="font-medium">54</font></a></div>
                </div>
            </div>
        </div>
        <hr class="mb-0">
        <div class="card-body">
            <small class="text-muted d-block">Email address </small>
            <h6>{{$user->email}}</h6>
            <small class="text-muted d-block pt-10">Phone</small>
            <h6>{{$user->phone_number}}</h6>
            <small class="text-muted d-block pt-10">Address</small>
            <h6>{{$user->address}}</h6>
            <small class="text-muted d-block pt-10">Description</small>
            <h6>{{$user->description}}</h6>
            <small class="text-muted d-block pt-30">Social Profile</small>
            <br>
            <button class="btn btn-icon btn-facebook"><i class="fab fa-facebook-f"></i></button>
            <button class="btn btn-icon btn-twitter"><i class="fab fa-twitter"></i></button>
            <button class="btn btn-icon btn-instagram"><i class="fab fa-instagram"></i></button>
        </div>
    </div>
  </div>
@endsection