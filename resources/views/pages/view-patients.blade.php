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

        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">All Patients</h3>
            </div>
            <div class="card-body table-responsive p-0" style="height: 550px;">
                <table class="table table-bordered table-hover text-nowrap table-head-fixed">
                    <thead>
                        <tr>
                            <th style="width: 1%">
                                {{__('#')}}
                            </th>
                            <th style="width: 20%">
                                {{__('Name')}}
                            </th>
                            <th style="width: 20%">
                                {{__('NHIF')}}
                            </th>
                            <th style="width: 20%">
                                {{__('Phone')}}
                            </th>
                            <th style="width: 25%">
                                {{__('Email Address')}}
                            </th>
                            <th style="width: 10%">
                                {{__('Age')}}
                            </th>
                            <th style="width: 4%" class="text-center">
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
                                    {{$data->firstname}} {{$data->lastname}}
                                </a>
                            </td>
                            <td>
                                {{$data->insurance}}
                            </td>
                            <td>
                                {{$data->phone}}
                            </td>
                            <td>
                                {{$data->email}}
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