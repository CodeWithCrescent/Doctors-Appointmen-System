@extends('layouts.pre-app')

@section('content')
  <main id="main">

    <!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Make an Appointment</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>
            
          <div class="row">
            <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">
                <!-- IMAGE -->
            </div>
            <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5 form-group">
            
                <!-- Pills navs -->
                <ul class="nav nav-pills nav-justified mb-3" id="ex1" role="tablist">
                <li class="nav-item" role="presentation">
                    <a class="nav-link {{ (request()->is('login')) ? 'active' : '' }}" id="tab-login" data-mdb-toggle="pill" href="#pills-login" role="tab"
                    aria-controls="pills-login" aria-selected="true">Login</a>
                </li>
                <li class="nav-item" role="presentation">
                    <a class="nav-link {{ (request()->is('register')) ? 'active' : '' }}" id="tab-register" data-mdb-toggle="pill" href="#pills-register" role="tab"
                    aria-controls="pills-register" aria-selected="false">Register</a>
                </li>
                </ul>
                <!-- Pills navs -->

              @if(session('error'))
                <div class="alert alert-danger d-flex align-items-center" role='alert'>
                  <i class="fa fa-exclamation-triangle"  aria-hidden="true"></i>&nbsp;
                  <p class="mb-0"> {{ session('error') }}</p>
                </div>
              @endif
              
                <!-- Pills content -->
                <div class="tab-content">
                    <div class="tab-pane fade {{ (request()->is('login')) ? 'show active' : '' }}" id="pills-login" role="tabpanel" aria-labelledby="tab-login">
                        <!-- <form> -->
                        <form id="signinForm" class="form-horizontal php-email-form" action="{{ route('login') }}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <!-- <div class="text-center mb-3">
                                <p>Sign in with:</p>
                                <button type="button" class="btn btn-link btn-floating mx-1">
                                <i class="fab fa-facebook-f"></i>
                                </button>

                                <button type="button" class="btn btn-link btn-floating mx-1">
                                <i class="fab fa-google"></i>
                                </button>

                                <button type="button" class="btn btn-link btn-floating mx-1">
                                <i class="fab fa-twitter"></i>
                                </button>

                                <button type="button" class="btn btn-link btn-floating mx-1">
                                <i class="fab fa-github"></i>
                                </button>
                            </div>

                            <p class="text-center">or:</p> -->

                            <!-- Email input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="loginName">Email</label>
                                <input id="email" type="email" value="{{ old('email') }}" class="form-control @if (session('invalid')) is-invalid @endif" name="email" required autocomplete="email">
                                
                            @if (session('invalid'))
                                <span class="invalid-feedback" role="alert">
                                <p>{{ session('invalid') }}</p>
                                </span>
                            @endif
                            </div>

                            <!-- Password input -->
                            <div class="form-outline mb-4">
                                <label class="form-label" for="loginPassword">Password</label>
                                <input id="password" type="password" class="form-control @if (session('invalid')) is-invalid @endif" name="password" required autocomplete="password">
                            </div>

                            <!-- Forgot Password -->
                            <div class="mb-4">
                                <a href="#!">Forgot password?</a>
                            </div>

                            <!-- button -->
                            <div class="text-center mb-4">
                                <button type="submit" class="btn btn-primary btn-block">Sign in</button>
                            </div>

                        </form>
                        <!-- </form> -->
                    </div> 
                    
                    <div class="tab-pane fade {{ (request()->is('register')) ? 'show active' : '' }}" id="pills-register" role="tabpanel" aria-labelledby="tab-register">
                        <!-- <form> -->
                        <form id="registerForm" class="form-horizontal php-email-form" action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
                            @csrf

                            <!-- Initial & Name -->
                            <div class="row">
                                <div class="col-md-4 col-sm-4 form-group mt-3 mt-md-0  mb-4">
                                    <!-- <label class="form-label" for="initial">Initial</label> -->
                                    <select name="initial" value="{{ old('initial') }}" id="initial" class="form-control @error('initial') is-invalid @enderror">
                                        <option value="" hidden value="">Choose Initial</option>
                                        <option>{{ __('Mr') }}</option>
                                        <option>{{ __('Ms') }}</option>
                                    </select>
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-8 col-sm-8 form-group mt-3 mt-md-0  mb-4">
                                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" id="name" placeholder="Your Name" required autocapitalize="on">
                                    <div class="validate"></div>
                                </div>
                            </div>
                            <!-- Email & Phone -->
                            <div class="row">
                                <div class="col-md-6 form-group mt-3 mt-md-0 mb-4">
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
                                    <div class="validate"></div>
                                </div>
                                <div class="col-md-6 form-group mt-3 mt-md-0 mb-4">
                                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" name="phone" id="phone" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                                    <div class="validate"></div>
                                </div>
                            </div>
                            <!-- Address -->
                            <div class="row">
                                <div class="col-md-12 form-group mt-3 mt-md-0 mb-4">
                                    <input type="text" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" name="address" id="address" placeholder="Your Home address">
                                    <div class="validate"></div>
                                </div>
                            </div>
                            <!-- Password -->
                            <div class="row">
                                <div class="col-md-6 form-group mt-3 mt-md-0 mb-4">
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Your Password" data-rule="minlen:5" data-msg="Password should be atleast 5 length">
                                    <div class="validate"></div>
                                </div>

                                      @error('password')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                        @enderror

                                <div class="col-md-6 form-group mt-3 mt-md-0 mb-4">
                                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Repeat Your Password" data-rule="minlen:5" data-msg="Password should be atleast 5 length">
                                    <div class="validate"></div>
                                </div>
                            </div>

                            <!-- Checkbox -->
                            <div class="form-check d-flex justify-content-center mb-4">
                                <input class="form-check-input me-2" type="checkbox" value="" id="registerCheck" aria-describedby="registerCheckHelpText" required />
                                <label class="form-check-label" for="registerCheck">
                                I have read and agree to the <a href="#!">terms and conditions</a>
                                </label>
                            </div>

                            <!-- Submit button -->
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary btn-block mb-3">Sign in</button>
                            </div>
                        </form>
                        <!-- </form> -->
                    </div>
                </div>
                <!-- Pills content -->
            </div>
          </div>
      </div>
    </section><!-- End Signin and Signup Section -->

  </main><!-- End #main -->
@endsection