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
        <form action="#">
            <div class="row">
                <div class="card col-md-10 offset-md-1">
                    <label for="">Search Patient:</label>
                    <div class="card-body row p-0">
                        <div class="col-10">
                            <div class="form-group">
                                <select class="select2" multiple="multiple" data-placeholder="Search by Patient's name.." style="width: 100%;">
                                    @foreach ($datas->sortBy('id')->take(3) as $key => $data)
                                    <option>{{ $data->firstname}} {{$data->lastname}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-2">
                            <div class="form-group">
                                <button type="submit" class="btn btn-info btn-block"><i class="fa fa-search "></i> Search</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Patients ({{count($datas)}})</h3>
                <!-- <a href="http://" class="btn btn-info btn-sm float-right"><i class="fa fa-plus"></i> Add Session</a> -->
            </div>
            <div class="card-body table-responsive p-0" style="height: 550px;">
                <table class="table table-bordered table-hover text-nowrap table-head-fixed">
                    <thead>
                        <tr>
                            <th style="width: 15%">
                                {{__('Patient Name')}}
                            </th>
                            <th style="width: 5%">
                                {{__('Appointment Number')}}
                            </th>
                            <th style="width: 15%">
                                {{__('Doctor')}}
                            </th>
                            <th style="width: 20%">
                                {{__('Session Title')}}
                            </th>
                            <th style="width: 15%">
                                {{__('Session Date & Time')}}
                            </th>
                            <th style="width: 20%">
                                {{__('Appointment Date')}}
                            </th>
                            <th style="width: 10%" class="text-center">
                                {{__('Action')}}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas->sortBy('id') as $key => $data)
                        <tr>
                            <td>
                                {{ ++$key }}
                            </td>
                            <td>
                                <a>
                                    {{$data->firstname}}
                                </a>
                            </td>
                            <td>
                                <a>
                                    {{$data->lastname}}
                                </a>
                            </td>
                            <td>
                                <a>
                                    {{$data->gender}}
                                </a>
                            </td>
                            <td>
                                {{$data->created_at}}
                            </td>
                            <td>
                                {{$data->category}}
                            </td>
                            <td class="project-actions text-right">
                                <a class="btn btn-info btn-sm" href="{{ 'view-profile/'.$data->id }}" data-toggle="lightbox" data-title="User Profile">
                                    <i class="fa fa-eye">
                                    </i>
                                    {{__('View')}}
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

    </section>
    <!-- /.content -->

</div>
<!-- Footer -->
@include('includes.footer')
@endsection