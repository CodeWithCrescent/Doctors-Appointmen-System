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
    <section oncontextmenu="return false" class="content">
        <form action="enhanced-results.html">
            <div class="row">
                <div class="card col-md-10 offset-md-1">
                    <label for="">Filter Schedule:</label>
                    <div class="card-body row p-0">
                        <div class="col-4">
                            <div class="form-group">
                                <div class="input-group date" id="reservationdate" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#reservationdate" />
                                    <div class="input-group-append" data-target="#reservationdate" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-6">
                            <div class="form-group">
                                <select class="form-control select2" data-placeholder="Search by Doctor's name.." data-dropdown-css-class="select2-info" style="width: 100%;">
                                    <option selected="selected" disabled="true">Search by Doctor's name..</option>
                                    @foreach ($datas->sortBy('id')->take(3) as $key => $data)
                                    <option>{{ $data->firstname}} {{$data->lastname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <button type="submit" class="btn btn-info btn-block"><i class="fa fa-search "></i> Filter</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Sessions ({{count($datas)}})</h3>
                <a href="{{ 'add-session' }}" data-toggle="lightbox" data-title="Add Session" class="btn btn-info btn-sm float-right"><i class="fa fa-plus"></i> Add Session</a>
            </div>
            <div class="card-body table-responsive p-0" style="height: 550px;">
                <table class="table table-bordered table-hover text-nowrap table-head-fixed">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                {{__('SN')}}
                            </th>
                            <th style="width: 5%">
                                {{__('Day')}}
                            </th>
                            <th style="width: 5%">
                                {{__('Date')}}
                            </th>
                            <th style="width: 10%">
                                {{__('Doctor Name')}}
                            </th>
                            <th style="width: 5%">
                                {{__('Start Time')}}
                            </th>
                            <th style="width: 10%">
                                {{__('End Time')}}
                            </th>
                            <th style="width: 20%">
                                {{__('Maximum Bookings')}}
                            </th>
                            <th style="width: 19%" class="text-center">
                                {{__('Action')}}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas->sortBy('scheduled_date') as $key => $data)
                        <tr>
                            <td>
                                {{ ++$key }}
                            </td>
                            <td>
                                {{ date('l', strtotime($data->scheduled_date)) }}
                            </td>
                            <td>
                                {{ date('d-m-Y', strtotime($data->scheduled_date)) }}
                            </td>
                            <td>
                                {{$data->firstname}} {{$data->lastname}}
                            </td>
                            <td>
                                {{ date('h:i A', strtotime($data->start_time)) }}
                            </td>
                            <td>
                                {{ date('h:i A', strtotime($data->end_time)) }}
                            </td>
                            <td>
                                {{ $data->maximum_bookings }}
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm" href="{{ 'view-profile/'.$data->id }}" data-toggle="lightbox" data-title="User Profile">
                                    <i class="fa fa-eye">
                                    </i>
                                    {{__('View')}}
                                </a>
                                <a class="btn btn-danger btn-sm" onclick="return confirm('DELETE {{$data->firstname}} {{$data->lastname}}&apos;s Session?')" href="{{ 'delete-session/'.$data->id }}">
                                    <i class="fa fa-trash">
                                    </i>
                                    {{__('Remove')}}
                                </a>
                                <!-- /.modal -->
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->

</div>
<!-- Footer -->
@include('includes.footer')
@endsection