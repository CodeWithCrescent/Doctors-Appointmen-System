<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">

  <title>{{ config('app.name', 'Laravel') }}</title>
  <meta content="" name="description">
  <meta content="" name="keywords">
  <meta content="Crescent Geniius" name="author">

  <!-- Favicons -->
  <link href="{{ asset('img/favicon.png') }}" rel="icon">
  <link href="{{ asset('img/apple-touch-icon.png') }}" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Raleway:300,300i,400,400i,500,500i,600,600i,700,700i|Poppins:300,300i,400,400i,500,500i,600,600i,700,700i" rel="stylesheet">

  <!-- Vendor CSS Files -->
  <link href="{{ asset('vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/animate.css/animate.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/boxicons/css/boxicons.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/remixicon/remixicon.css') }}" rel="stylesheet">
  <link href="{{ asset('vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

  <!-- Template Main CSS File -->
  <link href="{{ asset('css/style.css') }}" rel="stylesheet">

</head>

<body>

  <!-- ======= Top Bar ======= -->
  <div id="topbar" class="d-flex align-items-center fixed-top">
    <div class="container d-flex justify-content-between">
      <div class="contact-info d-flex align-items-center">
        <i class="bi bi-envelope"></i> <a href="mailto:crescent.sambila@gmail.com">info@doctors.app</a>
        <i class="bi bi-phone"></i> <a href="tel:+255 676 8279 92">+255 676 8279 92</a>
      </div>
      <div class="d-none d-lg-flex social-links align-items-center">
        <a href="#" class="twitter"><i class="bi bi-twitter"></i></a>
        <a href="#" class="facebook"><i class="bi bi-facebook"></i></a>
        <a href="instagram.com/mustgallery" class="instagram"><i class="bi bi-instagram"></i></a>
        <a href="#" class="linkedin"><i class="bi bi-linkedin"></i></i></a>
      </div>
    </div>
  </div>

  <!-- ======= Header ======= -->
  <header id="header" class="fixed-top">
    <div class="container d-flex align-items-center">

      <h1 class="logo me-auto"><a href="index.html">Doctors App</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="" alt="" class="img-fluid"></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto active" href="#hero">Home</a></li>
          <li><a class="nav-link scrollto" href="#about">About</a></li>
          <li><a class="nav-link scrollto" href="#services">Services</a></li>
          <li><a class="nav-link scrollto" href="#departments">Departments</a></li>
          <li><a class="nav-link scrollto" href="#doctors">Doctors</a></li>
          <li class="dropdown"><a href="#"><span>Account</span> <i class="bi bi-chevron-down"></i></a>
            <ul>
            @if (Route::has('login'))
                @auth
                    @if (Auth()->user()->role == 2)
                    <li><a href="{{ url('admin/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">DASHBOARD</a></li>
                    @elseif (Auth()->user()->role == 1)
                    <li><a href="{{ url('doctor/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">DASHBOARD</a></li>
                    @elseif (Auth()->user()->role == 0)
                    <li><a href="{{ url('patient/dashboard') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">DASHBOARD</a></li>
                    @endif
                @else
                    <li><a href="{{ route('login') }}" class="text-sm text-gray-700 dark:text-gray-500 underline">LOGIN</a></li>

                    @if (Route::has('register'))
                    <li><a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">REGISTER</a></li>
                    @endif
                @endauth
                @endif
            </ul>
          </li>
          <li><a class="nav-link scrollto" href="#contact">Contact</a></li>
        </ul>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->

      <a href="{{'appointment-schedule'}}" class="appointment-btn"><span class="d-none d-md-inline">Make an</span> Appointment</a>

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Appointment Section ======= -->
    <section id="appointment" class="appointment section-bg">
      <div class="container">

        <div class="section-title">
          <h2>Make an Appointment</h2>
          <p>Magnam dolores commodi suscipit. Necessitatibus eius consequatur ex aliquid fuga eum quidem. Sit sint consectetur velit. Quisquam quos quisquam cupiditate. Et nemo qui impedit suscipit alias ea. Quia fugiat sit in iste officiis commodi quidem hic quas.</p>
        </div>

        <form id="registerForm" class="form-horizontal php-email-form" action="{{ route('register') }}" method="POST" enctype="multipart/form-data">
            @csrf
          <div class="row">
            <div class="col-xl-5 col-lg-6 video-box d-flex justify-content-center align-items-stretch position-relative">
                
            </div>
            <div class="col-xl-7 col-lg-6 icon-boxes d-flex flex-column align-items-stretch justify-content-center py-5 px-lg-5 form-group">
                <h4>Already Registered? Sign in <a href="{{ route('login') }}">here</a> to continue..  </h4>
             <div class="row">
                <div class="col-md-4 col-sm-4 form-group">
                    <select name="initial" value="{{ old('initial') }}" id="initial" class="form-control @error('initial') is-invalid @enderror">
                        <option value="" hidden value="">Choose Initial</option>
                        <option>{{ __('Mr') }}</option>
                        <option>{{ __('Ms') }}</option>
                    </select>
                    <div class="validate"></div>
                </div>
                <div class="col-md-8 col-sm-8 form-group">
                    <input type="text" name="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('firstname') }}" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                    <div class="validate"></div>
                </div>
             </div>
             <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email">
                    <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input type="tel" class="form-control @error('phone') is-invalid @enderror" value="{{ old('phone') }}" name="phone" id="phone" placeholder="Your Phone" data-rule="minlen:4" data-msg="Please enter at least 4 chars">
                    <div class="validate"></div>
                </div>
             </div>
             <div class="row">
                <div class="col-md-12 form-group mt-3 mt-md-0">
                    <input type="text" class="form-control @error('address') is-invalid @enderror" value="{{ old('address') }}" name="address" id="address" placeholder="Your Home address">
                    <div class="validate"></div>
                </div>
             </div>
             <div class="row">
                <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password" id="password" placeholder="Your Password" data-rule="minlen:5" data-msg="Password should be atleast 5 length">
                    <div class="validate"></div>
                </div>
                <div class="col-md-6 form-group mt-3 mt-md-0">
                    <input type="password" class="form-control" name="password_confirmation" id="password_confirmation" placeholder="Repeat Your Password" data-rule="minlen:5" data-msg="Password should be atleast 5 length">
                    <div class="validate"></div>
                </div>
             </div>
             <div class="row">
                <!-- <div class="form-group mt-3">
                    <textarea class="form-control" name="message" rows="5" placeholder="Message (Optional)"></textarea>
                    <div class="validate"></div>
                </div> -->
                <div class="mb-3">
                    <div class="loading">Loading</div>
                    <div class="error-message"></div>
                    <div class="sent-message">Your appointment request has been sent successfully. Thank you!</div>
                </div>
             </div>
            </div>
            <div class="text-center"><button id="signup" type="submit">Click to Signup <span class="spinner-border spinner-border-sm visually-hidden"></span></button></div>
          </div>
        </form>
      </div>
    </section><!-- End Appointment Section -->

  </main><!-- End #main -->

  <!-- ======= Footer ======= -->
  <footer id="footer">

    <div class="container d-md-flex py-4">

      <div class="me-md-auto text-center text-md-start">
        <div class="copyright">
          &copy; Copyright <strong><span>Nunuget</span></strong>. All Rights Reserved
        </div>
        <div class="credits">
          Designed by <a href="https://www.icodesmart.com/crescent-geniius">Crescent Geniius</a>
        </div>
      </div>
      <div class="social-links text-center text-md-right pt-3 pt-md-0">
        <a href="#" class="twitter"><i class="bx bxl-twitter"></i></a>
        <!-- <a href="#" class="facebook"><i class="bx bxl-facebook"></i></a> -->
        <a href="#" class="instagram"><i class="bx bxl-instagram"></i></a>
        <!-- <a href="#" class="google-plus"><i class="bx bxl-skype"></i></a> -->
        <a href="#" class="linkedin"><i class="bx bxl-linkedin"></i></a>
      </div>
    </div>
  </footer><!-- End Footer -->

  <div id="preloader"></div>
  <a href="#" class="back-to-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Vendor JS Files -->
  <script src="{{ asset('vendor/purecounter/purecounter_vanilla.js') }}"></script>
  <script src="{{ asset('vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/glightbox/js/glightbox.min.js') }}"></script>
  <script src="{{ asset('vendor/swiper/swiper-bundle.min.js') }}"></script>
  <script src="{{ asset('vendor/php-email-form/validate.js') }}"></script>

  <!-- Template Main JS File -->
  <script src="{{ asset('js/main.js') }}"></script>

</body>

</html>