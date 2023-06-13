@extends('layouts.auth')

@section('content')
<!-- general form elements disabled -->
<div class="row">
  <div class="col-lg-2"></div>
  <div class="col-lg-8">
    <div class="card card-info">
      <div class="card-header">
        <h3 class="card-title">{{ __('Login to Continue..') }}</h3>
      </div>
      <!-- /.card-header -->

      <div class="card-body">
        <div class="bs-stepper">
          <div class="bs-stepper-header" role="tablist">
            <!-- your steps here -->
            <div class="step" data-target="#logins-part">
              <button type="button" class="step-trigger" role="tab" aria-controls="logins-part" id="logins-part-trigger">
                <span class="bs-stepper-circle"><i class="fa fa-user"></i> </span>
                <span class="bs-stepper-label">{{ __('Login') }}</span>
              </button>
            </div>
            <div class="line"></div>
          </div>

          <div class="bs-stepper-content">
            <!-- your steps content here -->
            <div id="logins-part" class="content" aria-labelledby="logins-part-trigger">
              <form id="loginForm" class="form-horizontal" method="POST" action="{{ route('login') }}">
                @csrf

                <div class="form-group">
                  <!-- Alert Messages -->
                  @if(Session('status'))
                  <div class="alert alert-success d-flex align-items-center" role='alert'>
                    <i class="fa fa-check-circle" aria-hidden="true"></i>&nbsp;
                    <p class="mb-0"> {{ session('status') }}</p>
                  </div>
                  @elseif(session('invalid'))
                  <div class="alert alert-danger d-flex align-items-center" role='alert'>
                    <i class="fa fa-exclamation-triangle" aria-hidden="true"></i>&nbsp;
                    <p class="mb-0"> {{ session('invalid') }}</p>
                  </div>
                  @endif
                  <label for="phone" class="col-md-4 control-label">{{ __('Phone Number') }}</label>

                  <div class="col-md-12 input-group">
                  <input id="phone" type="tel" class="form-control @error('phone') is-invalid @enderror" name="phone" value="{{ old('phone') }}" placeholder="Enter Phone Number" data-inputmask='"mask": "+255 999 9999 99"' data-mask required autocomplete="phone" autofocus>
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-phone"></span>
                      </div>
                    </div>
                    @if (session('invalid'))
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ session('invalid') }}</strong>
                    </span>
                    @endif
                  </div>
                </div>

                <div class="form-group">
                  <label for="password" class="col-md-4 control-label">{{ __('Password') }}</label>

                  <div class="col-md-12 input-group">
                    <input id="password" type="password" class="form-control @if (session('invalid')) is-invalid @endif" name="password" required autocomplete="password">
                    <div class="input-group-append">
                      <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-8 col-md-offset-4">
                    <div class="checkbox">
                      <input class="" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                      <label class="form-check-label col-md-4" for="remember">
                        {{ __('Remember Me') }}
                      </label>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="col-md-8 col-md-offset-4">
                    <input type="submit" value="Login" id="login-btn" onsubmit="document.getElementById('login-btn').value='Loading..'" class="btn bg-gradient-info btn-info">
                    <!-- <button type="submit" class="btn btn-info">
                                  <span class='spinner-border spinner-border-sm' role='status' aria-hidden='true'></span>
                                  Loading..
                                  </button> -->
                    @if (Route::has('password.request'))
                    <a class="btn btn-link text-muted" href="{{ route('password.request') }}">
                      {{ __('Forgot Your Password?') }}
                    </a>
                    @endif
                    {{__('OR')}}
                    <a class="btn btn-link text-muted" href="{{ route('register') }}">
                      {{ __('Register Here') }}
                    </a>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
      <!-- /.card-body -->
    </div>
    <div class="col-lg-2"></div>
  </div>

  @endsection