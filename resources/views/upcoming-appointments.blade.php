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
        <div class="table-responsive">
            <table class="table table-borderless">
              <tbody>
                <tr>
                @if (!empty($datas) && $datas->count())
                  @foreach ($datas as $data)
                  <!-- <td> -->
                    <div class="card">

                      <div class="card-body">
                        <h5><span class="small">Department</span> <span class="card-title fw-bold">| {{ $data->department_name }}</span></h5>

                        <div class="d-flex align-items-center">
                          <div class="ps-1">
                            <h6><span class="small">Attendant: </span><span  class="fw-bold">{{ $data->initial }}. {{ $data->firstname }} {{ $data->lastname }}</span></h6>
                            <span class="text-muted small pt-2 ps-1">Date due: </span><span class="text-success small pt-1 fw-bold">{{ \Carbon\Carbon::parse($data->scheduled_date)->format('l jS F, Y') }}</span><br>
                            <span class="text-muted small pt-2 ps-1">Start at: </span><span class="text-success small pt-1 fw-bold">{{ \Carbon\Carbon::parse($data->start_time)->format('g:i A') }}</span> ||
                            <span class="text-muted small pt-2 ps-1">End at: </span><span class="text-success small pt-1 fw-bold">{{ \Carbon\Carbon::parse($data->end_time)->format('g:i A') }}</span>

                          </div>
                        </div>
                        <div class="card-footer">
                          <div class="d-grid gap-2 mt-3 text-center">
                            <form action="{{ 'session-details/'.$data->session_id }}" method="POST">
                            @csrf
                                <button class="btn btn-primary" type="submit">CLICK TO BOOK</button>
                            </form>
                          </div>
                        </div>
                      </div>

                    </div><br>
                  <!-- </td> -->
                  @if ($loop->iteration % 3 == 0)
                    </tr><tr>
                  @endif                    
                  @endforeach
                    @else
                        <h5 class="text-center">Sorry! No Scheduled Appointments available!</h5>
                        <p class="text-center"><a href="{{'/'}}">Back Home</a></p>
                    @endif
                </tr>
              </tbody>
            </table>
        </div>
      </div>
    </section>

  </main><!-- End #main -->
@endsection
