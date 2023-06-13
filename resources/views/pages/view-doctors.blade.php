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
                <h3 class="card-title">All Doctors ({{count($datas)}})</h3>
            </div>
            <div class="card-body table-responsive p-0" style="height: 550px;">
                <table class="table table-bordered table-hover text-nowrap table-head-fixed">
                    @if (!empty($datas) && $datas->count())
                    <thead>
                        <tr>
                            <th style="width: 25%">
                                {{__('Doctor Name')}}
                            </th>
                            <th style="width: 25%">
                                {{__('Specialities')}}
                            </th>
                            <th style="width: 20%">
                                {{__('Department')}}
                            </th>
                            <th style="width: 10%">
                                {{__('Office')}}
                            </th>
                            <th style="width: 20%" class="text-center">
                                {{__('Action')}}
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($datas as $key => $data)
                        <tr>
                            <td>
                                <a>
                                {{$data->initial}}{{'. '}}{{$data->lastname .', '}}{{strtoupper($data->firstname)}}
                                </a>
                            </td>
                            <td>
                                {{$data->speciality_name}}
                            </td>
                            <td>
                                {{$data->department_name}}
                            </td>
                            <td>
                                {{$data->office_name}}
                            </td>
                            <td class="project-actions text-center">
                                <a class="btn btn-info btn-sm" href="{{ 'book-session/'.$data->id }}">
                                    <i class="fa fa-edit">
                                    </i>
                                    {{__('Book')}}
                                </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                    @else
                        <h3 class="text-center">No Doctor Registered!</h3>
                    @endif
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