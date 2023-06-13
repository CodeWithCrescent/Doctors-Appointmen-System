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
        <!-- /.row -->
        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>SN</th>
                      <th>Doctor Name</th>
                      <th>Date</th>
                      <th>Start Time</th>
                      <th>End Time</th>
                      <th>Status</th>
                      <th>Description</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    @foreach ($datas as $key => $data)
                        <tr>
                            <td>{{ ++$key }}</td>
                            <td>{{$data->firstname}} {{$data->lastname}}</td>
                            <td>{{ date('d-m-Y', strtotime($data->scheduled_date)) }}</td>
                            <td>{{ date('h:i A', strtotime($data->start_time)) }}</td>
                            <td>{{ date('h:i A', strtotime($data->end_time)) }}</td>
                            <td><span class="tag tag-success">Active</span></td>
                            <td>{{ $data->description }}</td>
                            <td><a class="btn btn-info btn-sm" href="{{ 'book-session/'.$data->id }}">
                                    <i class="fas fa-booking">
                                    </i>
                                    {{__('Book')}}
                                </a>
                            </td>
                        </tr>
                    @endforeach
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
        <!-- /.row -->
        </div>
    </section>
</div>

<!-- Footer -->
@include('includes.footer')

@endsection