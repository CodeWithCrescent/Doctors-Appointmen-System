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

        <!-- Default box -->
        <div class="card container-fluid">
            <div class="card-header p-2">
                <ul class="nav nav-pills">
                  <li class="nav-item"><a class="nav-link active" href="#departments" data-toggle="tab">Departments</a></li>
                  <li class="nav-item"><a class="nav-link" href="#speciality" data-toggle="tab">Speciality</a></li>
                  <li class="nav-item"><a class="nav-link" href="#offices" data-toggle="tab">Offices</a></li>
                </ul>
            </div><!-- /.card-header -->
            <div class="card-body">
                    <div class="tab-content">
                        <div class="active tab-pane" id="departments">
                            <div id="accordion">
                                <div class="card card-secondary">
                                    <div class="card-header">
                                        <h4 class="card-title w-100">
                                            <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                                            Click here to add Department
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="collapse" data-parent="#accordion">
                                        <div class="card-body">
                                            <form id="AddDepartment" class="form-horizontal row" action="{{ route('Dashboard | Add Department') }}" method="POST">
                                            @csrf
                                                <div class="form-group col-md-12">
                                                    <label for="department">Department Name</label>
                                                    <input type="text" id="department" name="department" value="{{ old('department') }}" class="form-control" required>
                                                </div>
                                                <div class="col-12">
                                                    <button type="submit" class="btn btn-success float-right">Add Department</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Departments</h3>

                                    <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 250px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                        <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                    @if (!empty($departments) && $departments->count())
                                        <thead>
                                            <tr>
                                                <th style="width: 10%">S/N</th>
                                                <th style="width: 60%">Department Name</th>
                                                <th style="width: 30%" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($departments as $key => $department)
                                        <tr>
                                            <td>
                                                {{ ++$key }}
                                            </td>
                                            <td>
                                                {{$department->department_name}}
                                            </td>
                                            <td class="project-actions text-center">
                                                <a class="btn btn-outline-secondary btn-sm" href="{{ 'edit-department/'.$department->id }}">
                                                    <i class="fa fa-edit">
                                                    </i>
                                                    {{__('Edit')}}
                                                </a>
                                                <a class="btn btn-outline-danger btn-sm" onclick="return confirm('Confirm to DELETE {{$department->department_name}} Department, its Offices and Specialities?')" href="{{ 'delete-department/'.$department->id }}">
                                                    <i class="fa fa-trash">
                                                    </i>
                                                    {{__('Delete')}}
                                                </a>
                                                <!-- /.modal -->
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    @else
                                        <h3 class="text-center">No Department Added.</h3>
                                    @endif
                                    </table>
                                    {!! $departments->links() !!}
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div><!-- /.tab-pane -->

                        <div class="tab-pane" id="speciality">
                            <div id="accordion">
                                <div class="card card-secondary">
                                    <div class="card-header">
                                        <h4 class="card-title w-100">
                                            <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                                            Click here to add Speciality
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="collapse" data-parent="#accordion">
                                        <form id="AddSpeciality" class="form-horizontal" action="{{ ('add-speciality') }}" method="POST">
                                        @csrf
                                            <div class="card-body row">
                                                <div class="form-group col-md-6">
                                                    <label for="department">Department</label>
                                                    <select id="department" name="department" class="form-control @error('department') is-invalid @enderror custom-select">
                                                        <option hidden>Select Department</option>
                                                        @foreach($departments as $department)
                                                        <option value="{{ $department->department_id }}" {{ old('department') == $department->id ? 'selected' : '' }}>{{ $department->department_name}} </option>
                                                        @endforeach
                                                    </select>

                                                    @error('department')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                    @enderror
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="speciality_name">Speciality Name</label>
                                                    <input type="text" id="speciality_name" name="speciality_name" value="{{ old('speciality_name')}}" class="form-control">
                                                </div>
                                                <div class="col-12">
                                                    <input type="submit" value="Add Speciality" class="btn btn-success float-right">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Specialities</h3>

                                    <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 250px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                        <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                    @if (!empty($specialities) && $specialities->count())
                                        <thead>
                                            <tr>
                                            <th style="width: 10%">S/N</th>
                                            <th style="width: 35%">Speciality Name</th>
                                            <th style="width: 35%">Department</th>
                                            <th style="width: 20%" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($specialities as $key => $speciality)
                                        <tr>
                                            <td>
                                                {{ ++$key }}
                                            </td>
                                            <td>
                                                {{$speciality->speciality_name}}
                                            </td>
                                            <td>
                                                {{$speciality->department_name}}
                                            </td>
                                            <td class="project-actions text-center">
                                                <a class="btn btn-outline-secondary btn-sm" href="{{ 'view-profile/'.$speciality->speciality_id }}" data-toggle="lightbox" data-title="User Profile">
                                                    <i class="fa fa-edit">
                                                    </i>
                                                    {{__('Edit')}}
                                                </a>
                                                <a class="btn btn-outline-danger btn-sm" onclick="return confirm('Confirm to DELETE {{ $speciality->speciality_name }} Speciality?')" href="#!">
                                                    <i class="fa fa-trash">
                                                    </i>
                                                    {{__('Delete')}}
                                                </a>
                                                <!-- /.modal -->
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    @else
                                        <h3 class="text-center">No Speciality Added.</h3>
                                    @endif
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div><!-- /.tab-pane -->

                        <div class="tab-pane" id="offices">
                            <div id="accordion">
                                <div class="card card-secondary">
                                    <div class="card-header">
                                        <h4 class="card-title w-100">
                                            <a class="d-block w-100" data-toggle="collapse" href="#collapseOne">
                                            Click here to add Office
                                            </a>
                                        </h4>
                                    </div>
                                    <div id="collapseOne" class="collapse" data-parent="#accordion">
                                    <form id="AddOffice" class="form-horizontal" action="{{ ('add-office') }}" method="POST">
                                        @csrf
                                            <div class="card-body row">
                                                <div class="form-group col-md-6">
                                                    <label for="department">Department</label>
                                                    <select id="department" name="department" class="form-control custom-select">
                                                        <option hidden>Select Department</option>
                                                        @foreach($departments as $department)
                                                        <option value="{{ $department->department_id }}" {{ old('department') == $department->id ? 'selected' : '' }}>{{ $department->department_name}} </option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="form-group col-md-6">
                                                    <label for="office_name">Office Name</label>
                                                    <input type="text" id="office_name" name="office_name" value="{{ old('office_name')}}" class="form-control">
                                                </div>
                                                <div class="col-12">
                                                    <input type="submit" value="Add Office" class="btn btn-success float-right">
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="card">
                                <div class="card-header">
                                    <h3 class="card-title">Offices</h3>

                                    <div class="card-tools">
                                    <div class="input-group input-group-sm" style="width: 250px;">
                                        <input type="text" name="table_search" class="form-control float-right" placeholder="Search">

                                        <div class="input-group-append">
                                        <button type="submit" class="btn btn-default">
                                            <i class="fas fa-search"></i>
                                        </button>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                                <!-- /.card-header -->
                                <div class="card-body table-responsive p-0">
                                    <table class="table table-hover text-nowrap">
                                    @if (!empty($offices) && $offices->count())
                                        <thead>
                                            <tr>
                                            <th style="width: 10%">S/N</th>
                                            <th style="width: 35%">Office Name</th>
                                            <th style="width: 35%">Department</th>
                                            <th style="width: 20%" class="text-center">Action</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        @foreach ($offices as $key => $office)
                                        <tr>
                                            <td>
                                                {{ ++$key }}
                                            </td>
                                            <td>
                                                {{$office->office_name}}
                                            </td>
                                            <td>
                                                {{$office->department_name}}
                                            </td>
                                            <td class="project-actions text-center">
                                                <a class="btn btn-outline-secondary btn-sm" href="{{ 'view-profile/'.$speciality->speciality_id }}" data-toggle="lightbox" data-title="User Profile">
                                                    <i class="fa fa-edit">
                                                    </i>
                                                    {{__('Edit')}}
                                                </a>
                                                <a class="btn btn-outline-danger btn-sm" onclick="return confirm('Confirm to DELETE {{ $office->office_name }} Office?')" href="#!">
                                                    <i class="fa fa-trash">
                                                    </i>
                                                    {{__('Delete')}}
                                                </a>
                                                <!-- /.modal -->
                                            </td>
                                        </tr>
                                        @endforeach
                                        </tbody>
                                    @else
                                        <h3 class="text-center">No Office Added.</h3>
                                    @endif
                                    </table>
                                </div>
                                <!-- /.card-body -->
                            </div>
                            <!-- /.card -->
                        </div><!-- /.tab-pane -->
                    </div><!-- /.tab-content -->
            </div><!-- /.card-body -->
        </div><!-- /.container fluid && card -->

    </section><!-- /.content -->
    
    @include('includes.footer')
@endsection