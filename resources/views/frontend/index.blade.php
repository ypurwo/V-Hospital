@extends('frontend.layouts.master')
@section('content')
<div class="app-content content">
    <div class="content-overlay"></div>
    <div class="header-navbar-shadow"></div>
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-9 col-12 mb-2">
                <div class="row breadcrumbs-top">
                    <div class="col-12">
                        <h2 class="content-header-title float-left mb-0">Find Doctors</h2>
                        <div class="breadcrumb-wrapper col-12">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.html">Home</a>
                                </li>
                                <li class="breadcrumb-item"><a href="#">Pages</a>
                                </li>
                                <li class="breadcrumb-item active">Find Doctors
                                </li>
                            </ol>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                <div class="form-group breadcrum-right">
                    <div class="dropdown">
                        <button class="btn-icon btn btn-primary btn-round btn-sm dropdown-toggle" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="feather icon-settings"></i></button>
                        <div class="dropdown-menu dropdown-menu-right"><a class="dropdown-item" href="#">Chat</a><a class="dropdown-item" href="#">Email</a><a class="dropdown-item" href="#">Calendar</a></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="content-body">
            <!-- Knowledge base Jumbotron -->
            <section id="knowledge-base-search">
                <div class="row">
                    <div class="col-12">
                        <div class="card knowledge-base-bg white">
                            <div class="card-content">
                                <div class="card-body p-sm-4 p-2">
                                    <h1 class="white">Find Your Doctor Specialist</h1>
                                    <p class="card-text mb-2">
                                        Select Appointment Time with your lovely doctor in hospital
                                    </p>
                                    <form>
                                        <fieldset class="form-group position-relative has-icon-left mb-0">
                                            <input type="text" class="form-control form-control-lg" id="searchbar" placeholder="Search Topic or Keyword">
                                            <div class="form-control-position">
                                                <i class="feather icon-search px-1"></i>
                                            </div>
                                        </fieldset>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Knowledge base Jumbotron ends -->
            <!-- Knowledge base -->
            <section id="knowledge-base-content">
                <div class="row search-content-info">
                    <div class="col-md-3 col-sm-3 col-12 search-content">
                        <div class="card">
                            <div class="card-body text-center">
                                <a href="page-kb-category.html">
                                    <img src="{{asset('templates/images/pages/graphic-3.png')}}" class="mx-auto mb-2" width="180" alt="knowledge-base-image">
                                    <h4>ONLINE CHATING CONSULTATION</h4>
                                    <small class="text-dark">Muffin lemon drops chocolate carrot cake chocolate bar sweet roll.</small>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-12 search-content">
                        <div class="card">
                            <div class="card-body text-center">
                                <a href="page-kb-category.html">
                                    <img src="{{asset('templates/images/pages/graphic-2.png')}}" class="mx-auto mb-2" width="180" alt="knowledge-base-image">
                                    <h4>ONLINE VIDEO CALL CONSULTATION</h4>
                                    <small class="text-dark">Gingerbread sesame snaps wafer soufflé. Macaroon brownie ice cream</small>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-12 search-content">
                        <div class="card">
                            <div class="card-body text-center">
                                <a href="page-kb-category.html">
                                    <img src="{{asset('templates/images/pages/graphic-1.png')}}" class="mx-auto mb-2" width="180" alt="knowledge-base-image">
                                    <h4>OFFLINE CONSULTATION</h4>
                                    <small class="text-dark">cotton candy caramels danish chocolate cake pie candy. Lemon drops tart.</small>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-12 search-content">
                        <div class="card">
                            <div class="card-body text-center">
                                <a href="page-kb-category.html">
                                    <img src="{{asset('templates/images/pages/graphic-4.png')}}" class="mx-auto mb-2" width="180" alt="knowledge-base-image">
                                    <h4>HOME CARE</h4>
                                    <small class="text-dark">Pudding oat cake carrot cake lemon drops gummies marshmallow.</small>
                                </a>
                            </div>
                        </div>
                    </div>
                    {{-- <div class="col-md-3 col-sm-3 col-12 search-content">
                        <div class="card">
                            <div class="card-body text-center">
                                <a href="page-kb-category.html">
                                    <img src="{{asset('templates/images/pages/graphic-5.png')}}" class="mx-auto mb-2" width="180" alt="knowledge-base-image">
                                    <h4>EMAIL MARKETING</h4>
                                    <small class="text-dark">Gummi bears pudding icing sweet caramels chocolate.Muffin croissant</small>
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3 col-sm-3 col-12 search-content">
                        <div class="card">
                            <div class="card-body text-center">
                                <a href="page-kb-category.html">
                                    <img src="{{asset('templates/images/pages/graphic-6.png')}}" class="mx-auto mb-2" width="180" alt="knowledge-base-image">
                                    <h4>DEMAND GENERATION</h4>
                                    <small class="text-dark">Dragée jelly beans candy canes pudding cake wafer. Muffin croissant.</small>
                                </a>
                            </div>
                        </div>
                    </div> --}}
                </div>
            </section>
            <!-- Knowledge base ends -->

            <!-- users list start -->
            <section class="users-list-wrapper">
                <!-- users filter start -->
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Filters</h4>
                        <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                        <div class="heading-elements">
                            <ul class="list-inline mb-0">
                                <li><a data-action="collapse"><i class="feather icon-chevron-down"></i></a></li>
                                <li><a data-action=""><i class="feather icon-rotate-cw users-data-filter"></i></a></li>
                                <li><a data-action="close"><i class="feather icon-x"></i></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="card-content collapse show">
                        <div class="card-body">
                            <div class="users-list-filter">
                                <form>
                                    <div class="row">
                                        <div class="col-12 col-sm-6 col-lg-3">
                                            <label for="users-list-role">Role</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" id="users-list-role">
                                                    <option value="">All</option>
                                                    <option value="user">Online Consultation</option>
                                                    <option value="staff">Offline Consultation</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-12 col-sm-6 col-lg-3">
                                            <label for="users-list-status">date</label>
                                            <fieldset class="form-group">
                                                <input type="date" name="date" class="form-control" id="date-appointment">
                                            </fieldset>
                                        </div>
                                        <div class="col-12 col-sm-6 col-lg-3">
                                            <label for="users-list-verified">Name</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" id="users-list-verified">
                                                    <option value="">All</option>
                                                    <option value="true">Yes</option>
                                                    <option value="false">No</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                        <div class="col-12 col-sm-6 col-lg-3">
                                            <label for="users-list-department">Specialist</label>
                                            <fieldset class="form-group">
                                                <select class="form-control" id="users-list-department">
                                                    <option value="">All</option>
                                                    <option value="Sales">Sales</option>
                                                    <option value="Devlopment">Devlopment</option>
                                                    <option value="Management">Management</option>
                                                </select>
                                            </fieldset>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- users filter end -->
                <!-- DataTable starts -->
                <div class="table-responsive">
                    <table class="table data-list-view">
                        <thead>
                            <tr>
                                <th></th>
                                <th>DATE</th>
                                <th>AVATAR</th>
                                <th>NAME</th>
                                <th>TITLE</th>
                                <th>SPECIALIST</th>
                                <th>POPULARITY</th>
                                <th>ACTION</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($doctors as $doctor )
                            <tr>
                                <td></td>
                                <td class="date">{{$doctor->date}}</td>
                                <td><img src="{{asset('images')}}/{{$doctor->doctor->image}}" class="table-user-thumb" width="100" style="border-radius: 50%"></td>
                                <td class="product-name">{{$doctor->doctor->name}}</td>
                                <td>
                                    <div class="chip chip-warning">
                                        <div class="chip-body">
                                            <div class="chip-text">{{$doctor->doctor->education}}</div>
                                        </div>
                                    </div>
                                </td>
                                <td class="product-category">{{$doctor->doctor->department}}</td>
                                <td>
                                    <div class="progress progress-bar-success">
                                        <div class="progress-bar" role="progressbar" aria-valuenow="40" aria-valuemin="40" aria-valuemax="100" style="width:97%"></div>
                                    </div>
                                </td>
                                <td class="product-action">
                                    <span class="action-edit"><i class="feather icon-edit"></i></span>
                                    <span class="action-delete"><i class="feather icon-trash"></i></span>
                                </td>
                            </tr>
                            @empty
                                <h4>No Doctor Available for today</h4>
                            @endforelse

                        </tbody>
                    </table>
                </div>
                <!-- DataTable ends -->
            </section>
            <!-- users list ends -->
        </div>
    </div>
</div>

{{--
<style type="text/css">
    body{
        display: grid;
        place-items: center;
        min-height: 100vh;
    }
    label{
        font-size: 10px;
        text-transform: uppercase;
        letter-spacing: 5px;
    }
    input{
        width: 250px;
        text-align: center;
        height: auto;
        font-size: 10px;
    }

</style> --}}
@endsection