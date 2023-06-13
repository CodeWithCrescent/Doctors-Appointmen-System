<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-light-info elevation-4 fixed-sidebar">
  <!-- Brand Logo -->
  <a href="{{'/'}}" class="brand-link">
    <img src="{{ asset('dist/img/AdminLTELogo.png')}}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">DMS Panel</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        @if (Auth::user()->user_profile != '')
        <img class="elevation-2 img-circle" src="{{ asset('dist/img/profile/'.Auth::user()->user_profile) }}" alt="User Image">
        @else
        <img class="elevation-2 img-circle" src="{{ asset('dist/img/avatar.png')}}" alt="User Image Avatar">
        @endif
        <!-- <img src="{{ asset('dist/img/profile/'.Auth::user()->user_profile) }}" class="img-circle elevation-2" alt="User Image"> -->
      </div>
      <div class="info">
        <a href="{{'/'}}" class="d-block">{{ Auth::user()->firstname }} {{ Auth::user()->lastname }}</a>
      </div>
    </div>

    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class
             with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="{{('dashboard')}}" class="nav-link {{ (request()->is('admin/dashboard','admin')) ? 'active' : '' }} {{ (request()->is('patient/dashboard','patient')) ? 'active' : '' }} {{ (request()->is('user/news*','user')) ? 'active' : '' }}">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              {{__('Dashboard')}}
            </p>
          </a>
        </li>
        @if (Auth()->user()->role == 2)
        <li class="nav-item {{ (request()->is('admin/doctors')) ? 'menu-open' : '' }} {{ (request()->is('admin/add-doctor')) ? 'menu-open' : '' }} {{ (request()->is('admin/settings')) ? 'menu-open' : '' }}">
          <a href="{{('#')}}" class="nav-link {{ (request()->is('admin/doctors')) ? 'active' : '' }} {{ (request()->is('admin/add-doctor')) ? 'active' : '' }} {{ (request()->is('admin/settings')) ? 'active' : '' }}">
            <i class="nav-icon far fa-plus-square"></i>
            <p>
              {{__('Doctors')}}
                <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{('add-doctor')}}" class="nav-link {{ (request()->is('admin/add-doctor')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Doctors</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{('doctors')}}" class="nav-link {{ (request()->is('admin/doctors')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Doctors</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{('settings')}}" class="nav-link {{ (request()->is('admin/settings')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Settings</p>
                </a>
            </li>
          </ul>
        </li>
        <li class="nav-item {{ (request()->is('admin/sessions')) ? 'menu-open' : '' }} {{ (request()->is('admin/add-session')) ? 'menu-open' : '' }}">
          <a href="{{('#')}}" class="nav-link {{ (request()->is('admin/sessions')) ? 'active' : '' }} {{ (request()->is('admin/add-session')) ? 'active' : '' }}">
            <i class="nav-icon far fa-clock"></i>
            <p>
              {{__('Sessions')}}
                <i class="fas fa-angle-left right"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
                <a href="{{('add-session')}}" class="nav-link {{ (request()->is('admin/add-session')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>Add Session</p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{('sessions')}}" class="nav-link {{ (request()->is('admin/sessions')) ? 'active' : '' }}">
                  <i class="far fa-circle nav-icon"></i>
                  <p>View Sessions</p>
                </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="{{('appointment')}}" class="nav-link {{ (request()->is('admin/appointment')) ? 'active' : '' }} {{ (request()->is('user/messages*')) ? 'active' : '' }}">
            <i class="nav-icon fas fa-medkit"></i>
            <p>
              {{__('Appointment')}}
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{('patients')}}" class="nav-link {{ (request()->is('admin/patients')) ? 'active' : '' }} {{ (request()->is('user/messages*')) ? 'active' : '' }}">
            <i class="nav-icon fab fa-accessible-icon"></i>
            <p>
              {{__('Patients')}}
            </p>
          </a>
        </li>
        @elseif (Auth()->user()->role == 0)
        <li class="nav-item">
          <a href="{{('doctors')}}" class="nav-link {{ (request()->is('patient/doctors')) ? 'active' : '' }}">
            <i class="nav-icon far fa-plus-square"></i>
            <p>
              {{__('All Doctors')}}
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{('schedule')}}" class="nav-link {{ (request()->is('patient/schedule')) ? 'active' : '' }}">
            <i class="nav-icon far fa-clock"></i>
            <p>
              {{__('Scheduled Sessions')}}
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{('bookings')}}" class="nav-link {{ (request()->is('patient/bookings')) ? 'active' : '' }}">
            <i class="nav-icon fas fa-medkit"></i>
            <p>
              {{__('My Bookings')}}
            </p>
          </a>
        </li>
        @elseif (Auth()->user()->role == 1)
        <li class="nav-item">
          <a href="{{('appointments')}}" class="nav-link {{ (request()->is('doctor/appointments')) ? 'active' : '' }}">
            <i class="nav-icon fas fa-medkit"></i>
            <p>
              {{__('My Appointments')}}
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{('sessions')}}" class="nav-link {{ (request()->is('doctor/sessions')) ? 'active' : '' }}">
            <i class="nav-icon far fa-clock"></i>
            <p>
              {{__('My Sessions')}}
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="{{('patients')}}" class="nav-link {{ (request()->is('doctor/patients')) ? 'active' : '' }}">
            <i class="nav-icon fas fa-medkit"></i>
            <p>
              {{__('My Patients')}}
            </p>
          </a>
        </li>
        @endif
        <li class="nav-item">
          <a href="{{ route('logout') }}" class="nav-link btn-default" onclick="event.preventDefault();
                        document.getElementById('logout-form').submit();">
            <i class="fa fa-sign-out-alt nav-icon"></i>
            <p>Logout</p>
          </a>

          <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
            @csrf
          </form>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>