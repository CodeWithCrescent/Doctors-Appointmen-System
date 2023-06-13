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

      <h1 class="logo me-auto"><a href="/">Doctors App</a></h1>
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

      <a href="#appointment" class="appointment-btn scrollto"><span class="d-none d-md-inline">Make an</span> Appointment</a>

    </div>
  </header><!-- End Header -->

  <main id="main">

    <!-- ======= Breadcrumbs Section ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2 class="d-none d-md-inline">Appointments</h2>
          <ol>
            <li><a href="{{'/'}}">Home</a></li>
            <li>Upcoming <span class="d-md-none d-sm-inline">Appointments</span></li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs Section -->

    <section class="inner-page">
      <div class="container">
        <div class="table-responsive">
            <table class="table table-borderless">
              <tbody>
                <tr>
                  @foreach ($datas as $data)
                  <!-- <td> -->
                    <div class="card">

                      <div class="card-body ">
                        <h5><span class="small">Department</span> <span class="card-title fw-bold">| {{ $data->department_name }}</span></h5>

                        <div class="d-flex align-items-center">
                          <div class="ps-1">
                            <h6><span class="small">Attendant: </span><span  class="fw-bold">{{ $data->initial }}. {{ $data->firstname }} {{ $data->lastname }}</span></h6>
                            <span class="text-muted small pt-2 ps-1">Date due: </span><span class="text-success small pt-1 fw-bold">{{ \Carbon\Carbon::parse($data->scheduled_date)->format('l jS F, Y') }}</span><br>
                            <span class="text-muted small pt-2 ps-1">Start at: </span><span class="text-success small pt-1 fw-bold">{{ \Carbon\Carbon::parse($data->start_time)->format('g:i A') }}</span> ||
                            <span class="text-muted small pt-2 ps-1">End at: </span><span class="text-success small pt-1 fw-bold">{{ \Carbon\Carbon::parse($data->end_time)->format('g:i A') }}</span><hr>
                            <span class="text-muted small pt-2 ps-1">"{{ $data->description }}"</span>

                          </div>
                        </div>
                        <div class="card-footer">
                          <form action="{{ $data->session_id }}" method="POST">
                            @csrf
                          <div class="d-grid gap-2 mt-3">
                            <button class="btn btn-sm btn-outline-primary" type="submit">CLICK TO BOOK</button>
                            <!-- <a href="{{ 'book-appointment/'.$data->session_id }}" class="btn btn-sm btn-outline-primary" type="button">CLICK TO BOOK</a> -->
                          </div>
                          </form>
                        </div>
                      </div>

                    </div><br>
                  <!-- </td> -->
                  @if ($loop->iteration % 3 == 0)
                    </tr><tr>
                  @endif                    
                  @endforeach
                </tr>
              </tbody>
            </table>
        </div>
      </div>
    </section>

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