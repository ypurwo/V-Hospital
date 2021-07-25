@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">

        <div class="col-md-4">
            <div class="card">
                <div class="card-header">User Profile</div>
                <div class="card-body">
                    <p>Name : {{auth()->user()->name}}</p>
                    <p>Email : {{auth()->user()->email}}</p>
                    <p>Address : {{auth()->user()->address}}</p>
                    <p>Phone Number : {{auth()->user()->phone_number}}</p>
                    <p>Bio : {{auth()->user()->description}}</p>
                </div>
            </div>
        </div>
        <div class="col-md-8">
            @if(Session::has('message'))
            <div class="alert bg-success alert-success text-white">
                {{Session::get('message')}}
            </div>
            @endif
            <div class="card">
                <div class="card-header">Update Profile</div>
                <div class="card-body">
                    <form action="{{route('profile.store')}}" method="post">@csrf
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{auth()->user()->name}}">
                                @error('name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="address" class="form-control @error('address') is-invalid @enderror" value="{{auth()->user()->address}}">
                                @error('address')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label>Phone Number</label>
                            <input type="text" name="phone_number" class="form-control @error('phone_number') is-invalid @enderror" value="{{auth()->user()->phone_number}}">
                                @error('phone_number')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label>Gender</label>
                            <select name="gender" class="form-control @error('gender') is-invalid @enderror">
                                <option value="">Select Gender</option>
                                @foreach(['male','female'] as $gender)
                                <option value="{{$gender}}" @if(auth()->user()->gender==$gender)selected @endif>{{$gender}}</option>
                                @endforeach
                            </select>
                                @error('gender')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                        </div>
                        <div class="form-group">
                            <label>Bio</label>
                            <textarea name="description" id="" cols="30" rows="4" class="form-control">{{auth()->user()->description}}</textarea>
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <div class="card-header">Update image</div>
                <form action="{{route('profile.image')}}" method="post" enctype="multipart/form-data">@csrf
                    <div class="card-body">
                        <div class="text-center">
                        @if(!auth()->user()->image)
                            <img src="/images/user/06.jpg" class="rounded-circle" width="125">
                        @else
                            <img src="{{asset('images/profile')}}/{{auth()->user()->image}}" class="rounded-circle" width="125">
                        @endif
                        <br>
                        <hr>
                        <input type="file" name="file" class="form-control" placeholder="Upload Image" required="">
                        <br>
                            @error('file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        <button type="submit" class="btn btn-primary">Update</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
