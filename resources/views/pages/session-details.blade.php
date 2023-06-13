@extends('layouts.pre-app')

@section('content')
  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2 class="d-none d-md-inline">Appointments</h2>
          <ol>
            <li><a href="{{'/'}}">Home</a></li>
            <li>Upcoming <span class="d-md-none d-sm-inline">Appointments</span></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
      <div class="container">
          <div class="card>"
            <div class="card-body">
              <div class="row offset-md-2">
              <h1 class="text-center fw-bold text-primary">Muhumbili National Hospital</h1><hr>
                <div class="col-7">
                  <div class="d-flex align-items-center">
                    <div class="ps-1">
                      <h5><span class="small">Ref no. </span><span class="card-title fw-bold">{{ $datas->reference_num }}</span></h5>
                      <h6><span class="small">Department:</span> <span class="card-title fw-bold"> {{ $datas->department_name }}</span></h6>
                      <h6><span class="small">Attendant: </span><span  class="fw-bold">{{ $datas->initial }}. {{ $datas->firstname }} {{ $datas->lastname }}</span></h6>
                      <span><i class="fa-solid fa-calendar"></i> {{ \Carbon\Carbon::parse($datas->start_time)->format('D, M d, Y g:i A') }}</span>
                      <div class="booking-total-tickets">
                        <i class="fa-solid fa-clock rotate-icon"></i>
                          Duration : <span class="booking-count-tickets mx-2">{{ floor((strtotime($datas->end_time)-strtotime($datas->start_time)) / 3600) }} Hours</span>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="col-5">
                    <div class="QR-dt">
                      <h6><span class="card-title fw-bold">APPOINTMENT No.</span></h6>
                        <div class="QR-scanner text-center">
                          <div class="large-numbers">
                            <span>{{ $datas->appointment_id }}</span>
                          </div>
                        </div>
                        <p>Powered by Nunuget</p>
                    </div>
                </div>
                <em class="text-center text-muted mt-3">We're so glad to serve you!</em> 
          <div class="cut-line">
              <i class="fa-solid fa-scissors"></i>
          </div>
              </div>      
            </div> 
            <div class="card-footer">
              <div class="text-centerm gap-2 mt-3">
                <form action="{{ $datas->session_id }}" method="POST">
                 @csrf
                  <button class="btn btn-sm btn-primary" type="submit">DOWNLOAD</button>
                  
                 <a href="{{ route('Dashboard | Discard Appointment', ['appointment_id' => $datas->appointment_id]) }}" class="btn btn-sm btn-danger float-end" onclick="return confirm('Are you sure you want to Cancel this appointment?')">CANCEL</a>

                </form>
              </div>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection