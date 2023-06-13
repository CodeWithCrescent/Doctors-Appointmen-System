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
        <div class="container-fluid">
            <div class="card card-body">
                <!-- form start -->
                <form id="add-session" class="form-horizontal" action="{{ ('add-session-action') }}" method="POST">
                @csrf
                        <div class="row">
                            <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-6 form-group">
                                    <label for="date" class="control-label">{{ __('Date') }}</label>
                                        <input name="date" type="date" class="form-control @error('date') is-invalid @enderror" value="{{ old('date') }}" placeholder="Enter Date" data-inputmask-alias="datetime" data-inputmask-inputformat="dd-mm-yyyy" data-mask required autocomplete="off">

                                        @error('date')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="bookings" class="control-label">{{ __('Max. Bookings') }}</label>
                                    <input id="bookings" type="number" class="form-control @error('bookings') is-invalid @enderror" name="bookings" value="{{ old('bookings') }}" placeholder="Enter bookings" required autocomplete="bookings" autofocus>

                                        @error('bookings')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                </div>
                                <div class="col-md-6 form-group">
                                    <label for="start_time" class="control-label">{{ __('Start Time') }}</label>
                                    <input id="start_time" type="time" class="form-control @error('start_time') is-invalid @enderror" name="start_time" value="{{ old('start_time') }}" placeholder="Enter start_time" required autocomplete="start_time" autofocus>
                                    
                                        @error('start_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                </div>
                                <!-- End Time -->
                                <div class="form-group col-md-6">
                                    <label for="end_time" class="control-label">{{ __('End Time') }}</label>

                                    <input id="end_time" type="time" class="form-control @error('end_time') is-invalid @enderror" name="end_time" value="{{ old('end_time') }}" placeholder="Enter end_time" required autocomplete="end_time">

                                        @error('end_time')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="row">
                                <!-- Doctor Select -->
                                <div class="form-group col-md-12">
                                    <label for="employee_no" class="control-label">{{ __("Doctor") }}</label>

                                    <select id="doctor" name="doctor" class="form-control @error('doctor') is-invalid @enderror custom-select">
                                        <option hidden>Select doctor</option>
                                        @foreach($doctors as $doctor)
                                        <option value="{{ $doctor->doctor_id }}" {{ old('doctor') == $doctor->id ? 'selected' : '' }}>{{ $doctor->initial}}.{{ $doctor->firstname}} {{ $doctor->lastname}} </option>
                                        @endforeach
                                    </select>

                                        @error('doctor')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                                <div class="form-group col-md-12">
                                    <label for="description" class="control-label">{{ __("Description") }}</label>

                                    <textarea class="form-control" name="description" id="description" cols="30" placeholder="Optional"></textarea>

                                        @error('description')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                            </div>
                            </div>
                        </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-info float-right">Click to Add</button>
                        <button type="reset" class="btn btn-secondary">Reset</button>
                    </div>
                </form>
            </div>
            <!-- /.card-body -->
        </div>
        <!-- /.card -->

    </section>
    <!-- /.content -->
    <!-- Footer -->
    @include('includes.footer')
@endsection