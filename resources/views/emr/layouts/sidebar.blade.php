<div class="page-wrap">
    <div class="app-sidebar colored">
        <div class="sidebar-header">
            <a class="header-brand" href="{{url('/dashboard')}}">
                <div class="logo-img">

                </div>
                <span class="text">V-Hospital</span>
            </a>
            <button type="button" class="nav-toggle"><i data-toggle="expanded" class="ik ik-toggle-right toggle-icon"></i></button>
            <button id="sidebarClose" class="nav-close"><i class="ik ik-x"></i></button>
        </div>

        <div class="sidebar-content">
            <div class="nav-container">
                <nav id="main-menu-navigation" class="navigation-main">
                    <div class="nav-lavel">Navigation</div>
                    <div class="nav-item active">
                        <a href="{{url('dashboard')}}"><i class="ik ik-bar-chart-2"></i><span>Nursing Assessment</span></a>
                    </div>

                    @if(auth()->check()&& auth()->user()->role->name === 'admin')
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Department</span> <span class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a href="{{route('department.create')}}" class="menu-item">Create</a>
                            <a href="{{route('department.index')}}" class="menu-item">View</a>
                        </div>
                    </div>
                    @endif

                      @if(auth()->check()&& auth()->user()->role->name === 'admin')
                    <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Medical Support</span> <span class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a href="{{route('doctor.create')}}" class="menu-item">Laboratorium</a>
                            <a href="{{route('doctor.index')}}" class="menu-item">Radiology</a>
                        </div>
                    </div>
                    @endif
                      @if(auth()->check()&& auth()->user()->role->name === 'doctor')
                       <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Medical Assessment</span> <span class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a href="{{route('appointment.create')}}" class="menu-item">SOAP</a>
                            <a href="{{route('appointment.index')}}" class="menu-item">Prescription</a>
                        </div>
                    </div>
                    @endif

                    @if(auth()->check()&& auth()->user()->role->name === 'doctor')
                       <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Patients</span> <span class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a href="{{route('patients.today')}}" class="menu-item">Patients (today)</a>
                            <a href="{{route('prescribed.patients')}}" class="menu-item">All patients (prescription)</a>
                        </div>
                    </div>
                    @endif

                    @if(auth()->check()&& auth()->user()->role->name === 'admin')
                     <div class="nav-item has-sub">
                        <a href="javascript:void(0)"><i class="ik ik-layers"></i><span>Patient Appointment</span> <span class="badge badge-danger"></span></a>
                        <div class="submenu-content">
                            <a href="{{route('patient')}}" class="menu-item">Today Appointment</a>
                            <a href="{{route('all.appointments')}}" class="menu-item">All Time Appointment</a>
                        </div>
                    </div>
                    @endif

                    <div class="nav-item active">
                        <a onclick="event.preventDefault();
                            document.getElementById('logout-form').submit();" href="{{ route('logout') }}"><i class="ik ik-power dropdown-icon"></i><span>Logout</span></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>
                    </div>

                </nav>
            </div>
        </div>
    </div>