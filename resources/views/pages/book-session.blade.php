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
            @foreach ($datas as $data)
            <div class="callout callout-info">
                <h5>DEPARTMENT: {{ $data->department_name }}</h5>
                <h6>DOCTOR: {{ $data->initial }}. {{ $data->firstname }} {{ $data->lastname }}</h6>
                <h6>BOOKING DUE: {{ $data->scheduled_date }}</h6>
                <h6>START AT: {{ $data->start_time }}</h6>
                <h6>TO: {{ $data->end_time }}</h6>
                <a href="#" class="btn btn-block btn-info">{{__('Click to Book')}}</a>
            </div>     
            @endforeach
        </div>
    </section>
</div>

<!-- Footer -->
@include('includes.footer')

@endsection