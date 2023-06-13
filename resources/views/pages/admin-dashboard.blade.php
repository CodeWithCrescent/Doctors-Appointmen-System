@extends('layouts.app')

@section('content')
<!-- Sidebar Tab -->
@include('includes.sidebar')
<!-- Navigation Bar -->
@include('includes.navbar')
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Header -->
    @include('includes.header')

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <!-- Info boxes -->
            <div class="row">
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box">
                        <span class="info-box-icon bg-danger elevation-1"><i class="fas fa-user-md"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Doctors qms</span>
                            <span class="info-box-number">
                                10
                                <small>%</small>
                            </span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-info elevation-1"><i class="fab fa-accessible-icon"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Patients</span>
                            <span class="info-box-number">410000</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->

                <!-- fix for small devices only -->
                <div class="clearfix hidden-md-up"></div>

                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-success elevation-1"><i class="fas fa-medkit"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">New Bookings</span>
                            <span class="info-box-number">76</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
                <div class="col-12 col-sm-6 col-md-3">
                    <div class="info-box mb-3">
                        <span class="info-box-icon bg-warning elevation-1"><i class="fas fa-heartbeat"></i></span>

                        <div class="info-box-content">
                            <span class="info-box-text">Today Sessions</span>
                            <span class="info-box-number">22</span>
                        </div>
                        <!-- /.info-box-content -->
                    </div>
                    <!-- /.info-box -->
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-md-6">
                    <div class="callout callout-warning">
                        <h5 class="text-primary">Upcoming Appointments until Next Sunday!</h5>

                        <p>Here's Quick access to Upcoming Appointments until 7 days
                            More details available in @Appointment section.</p>
                    </div>
                    <div class="card">
                        <div class="card-body table-responsive p-0" style="height: 250px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Appoint No.</th>
                                        <th>Patient Name</th>
                                        <th>Doctor</th>
                                        <th>Session</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>183</td>
                                        <td>John Doe</td>
                                        <td>11-7-2014</td>
                                        <td><span class="badge badge-success">Approved</span></td>
                                    </tr>
                                    <tr>
                                        <td>219</td>
                                        <td>Alexander Pierce</td>
                                        <td>11-7-2014</td>
                                        <td><span class="badge badge-warning">Pending</span></td>
                                    </tr>
                                    <tr>
                                        <td>657</td>
                                        <td>Bob Doe</td>
                                        <td>11-7-2014</td>
                                        <td><span class="badge badge-primary">Approved</span></td>
                                    </tr>
                                    <tr>
                                        <td>175</td>
                                        <td>Mike Doe</td>
                                        <td>11-7-2014</td>
                                        <td><span class="badge badge-danger">Denied</span></td>
                                    </tr>
                                    <tr>
                                        <td>134</td>
                                        <td>Jim Doe</td>
                                        <td>11-7-2014</td>
                                        <td><span class="badge badge-success">Approved</span></td>
                                    </tr>
                                    <tr>
                                        <td>494</td>
                                        <td>Victoria Doe</td>
                                        <td>11-7-2014</td>
                                        <td><span class="badge badge-warning">Pending</span></td>
                                    </tr>
                                    <tr>
                                        <td>832</td>
                                        <td>Michael Doe</td>
                                        <td>11-7-2014</td>
                                        <td><span class="badge badge-primary">Approved</span></td>
                                    </tr>
                                    <tr>
                                        <td>982</td>
                                        <td>Rocky Doe</td>
                                        <td>11-7-2014</td>
                                        <td><span class="badge badge-danger">Denied</span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <input type="button" value="Show all Appointments" class="btn btn-primary btn-block btn-sm">
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="callout callout-info">
                        <h5 class="text-primary">No Sessions until Next Sunday</h5>

                        <p>Here's Quick access to Upcoming Sessions that Scheduled until 7 days
                            Add,Remove and Many features available in @Schedule section.</p>
                    </div>

                    <div class="card">
                        <div class="card-body table-responsive p-0" style="height: 250px;">
                            <table class="table table-head-fixed text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Session Title</th>
                                        <th>Doctor</th>
                                        <th>Scheduled Date & Time</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>183</td>
                                        <td>John Doe</td>
                                        <td>11-7-2014</td>
                                    </tr>
                                    <tr>
                                        <td>219</td>
                                        <td>Alexander Pierce</td>
                                        <td>11-7-2014</td>
                                    </tr>
                                    <tr>
                                        <td>657</td>
                                        <td>Bob Doe</td>
                                        <td>11-7-2014</td>
                                    </tr>
                                    <tr>
                                        <td>175</td>
                                        <td>Mike Doe</td>
                                        <td>11-7-2014</td>
                                    </tr>
                                    <tr>
                                        <td>134</td>
                                        <td>Jim Doe</td>
                                        <td>11-7-2014</td>
                                    </tr>
                                    <tr>
                                        <td>494</td>
                                        <td>Victoria Doe</td>
                                        <td>11-7-2014</td>
                                    </tr>
                                    <tr>
                                        <td>832</td>
                                        <td>Michael Doe</td>
                                        <td>11-7-2014</td>
                                    </tr>
                                    <tr>
                                        <td>982</td>
                                        <td>Rocky Doe</td>
                                        <td>11-7-2014</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <!-- /.card-body -->
                        <input type="button" value="Show all Sessions" class="btn btn-primary btn-block btn-sm">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<!-- Footer -->
@include('includes.footer')

@endsection