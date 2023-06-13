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
                <form id="registerDoctor" class="form-horizontal" action="{{ ('add-doctor-action') }}" method="POST">
                @csrf
                        <div class="row">
                            <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-2 col-sm-2 form-group">
                                    <label for="initial" class="control-label">{{ __('Initial') }}</label>
                                        <select name="initial" value="{{ old('initial') }}" class="form-control @error('initial') is-invalid @enderror" required>
                                            <option>{{ __('Dr') }}</option>
                                            <option>{{ __('Mr') }}</option>
                                            <option>{{ __('Ms') }}</option>
                                        </select>
                                </div>
                                <div class="col-md-10 form-group">
                                    <label for="name" class="control-label">{{ __('Name') }}</label>
                                    <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" placeholder="Enter Name" required autocomplete="name" autofocus>

                                        @error('name')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                </div>
                                <!-- Email Input -->
                                <div class="form-group col-md-12">
                                    <label for="email" class="control-label">{{ __('E-Mail Address') }}</label>

                                    <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="Enter Email" required autocomplete="email">

                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                                <!-- Mobile Phone input -->
                                <div class="col-md-8 form-group">
                                    <label for="phone" class="control-label">Mobile Phone</label>

                                    <input id="phone" type="text" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Enter Phone Number" data-inputmask='"mask": "+255 999 9999 99"' data-mask required autocomplete="phone" autofocus>

                                        @error('phone')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                                <div class="form-group col-md-4">
                                    <label for="gender" class="control-label">{{ __('Gender') }}</label>
                                    <select name="gender" value="{{ old('gender') }}" class="form-control @error('gender') is-invalid @enderror">
                                        <option hidden value="">{{ __('Select Gender') }}</option>
                                        <option>{{ __('MALE') }}</option>
                                        <option>{{ __('FEMALE') }}</option>
                                    </select>

                                    @error('gender')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                            </div>
                            </div>
                            <div class="col-md-6">
                            <div class="row">
                                <!-- Email Input -->
                                <div class="form-group col-md-12">
                                    <label for="employee_no" class="control-label">{{ __("Doctor's Employee No.") }}</label>

                                    <input id="employee_no" type="text" class="form-control @error('employee_no') is-invalid @enderror" name="employee_number" value="{{ old('employee_number') }}" placeholder="Enter Employee Number" required autocomplete="false">

                                        @error('employee_no')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror
                                </div>
                                <div class="form-group col-sm-8">
                                    <label for="department_id" class="control-label">{{ __('Department') }}</label>
                                    <select id="department" name="department" class="form-control @error('department') is-invalid @enderror custom-select">
                                        <option selected disabled hidden value="">Select Department</option>
                                        @foreach($departments as $department)
                                        <option value="{{ $department->department_id }}" {{ old('department') == $department->department_id ? 'selected' : '' }}>{{ $department->department_name}} </option>
                                        @endforeach
                                    </select>

                                    @error('department')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                </div>
                                <div class="form-group col-sm-4">
                                    <label for="office_name" class="control-label">{{ __('Office') }}</label>
                                    <select id="office_name" name="office_name" class="form-control @error('office_name') is-invalid @enderror custom-select">
                                        <option hidden value="">{{ __('Select Office') }}</option>
                                        <option disabled value="">{{ __('NULL') }}</option>
                                    </select>

                                    @error('office_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <script>
                                        //Add Event Listener to the Department Input
                                        document.getElementById('department').addEventListener('change', function() {
                                            var departmentId = this.value;
                                            var url = 'get-offices/' + departmentId;
                                            fetch(url)
                                                .then(response => response.json())
                                                .then(data => {
                                                    //Update the Office options
                                                    var options = '<option hidden value="">Select Office</option>';
                                                    for (var i = 0; i < data.length; i++) {
                                                        options += '<option value="' + data[i].office_id + '">' + data[i].office_name + '</option>';
                                                    }
                                                    document.getElementById('office_name').innerHTML = options;
                                                });
                                        });
                                    </script>
                                </div>
                                <div class="form-group col-sm-12">
                                    <label for="speciality_name" class="control-label">{{ __('Specialization') }}</label>
                                    <select id="speciality_name" name="speciality_name" value="{{ old('speciality_name') }}" class="form-control @error('speciality_name') is-invalid @enderror">
                                                <option hidden value="">{{ __('Select Speciality') }}</option>
                                                <option disabled value="">{{ __('NULL') }}</option>
                                    </select>

                                    @error('speciality_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <script>
                                        //Add Event Listener to the Department Input
                                        document.getElementById('department').addEventListener('change', function() {
                                            var departmentId = this.value;
                                            var url = 'get-speciality/' + departmentId;
                                            fetch(url)
                                                .then(response => response.json())
                                                .then(data => {
                                                    //Update the Office options
                                                    var options = '<option hidden value="">Select Speciality</option>';
                                                    for (var i = 0; i < data.length; i++) {
                                                        options += '<option value="' + data[i].speciality_id + '">' + data[i].speciality_name + '</option>';
                                                    }
                                                    document.getElementById('speciality_name').innerHTML = options;
                                                });
                                        });
                                    </script>
                                </div>
                            </div>
                            </div>
                        </div>

                    <div class="card-footer">
                        <button type="submit" class="btn btn-info float-right">Click to Add</button>
                        <button type="reset" class="btn btn-secondary">Cancel</button>
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