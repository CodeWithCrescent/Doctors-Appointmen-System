<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="color-scheme" content="light">
    <!-- <meta http-equiv="refresh" content="30"> -->
    <title>{{ Route::currentRouteName()}}</title>

    <!-- Favicons -->
    <link href="{{ asset('dist/img/admin.png')}}" rel="icon">
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css')}}">
    <!-- Theme Styling -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.css')}}">
    <!-- icheck bootstrap -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- Custom View User CSS -->
    <link rel="stylesheet" href="{{ asset('plugins/ekko-lightbox/ekko-lightbox.css')}}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('plugins/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <!-- Toastr -->
    <link rel="stylesheet" href="{{ asset('plugins/toastr/toastr.min.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css')}}">
    <!-- jsGrid -->
    <link rel="stylesheet" href="{{ asset('plugins/jsgrid/jsgrid.min.css')}}">
    <link rel="stylesheet" href="{{ asset('plugins/jsgrid/jsgrid-theme.min.css')}}">
</head>

<body class="hold-transition sidebar-mini layout-footer-fixed">
    <div class="wrapper">

        @yield('content')

    </div>


    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js')}}"></script>
    <!-- Bootstrap 4 -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- AdminLTE Scripts -->
    <script src="{{ asset('dist/js/adminlte.js')}}"></script>
    <script src="{{ asset('dist/js/demo.js')}}"></script>
    <!-- Custom View User -->
    <script src="{{ asset('plugins/ekko-lightbox/ekko-lightbox.js')}}"></script>
    <script src="{{ asset('plugins/select2/js/select2.full.js')}}"></script>
    <!-- Toastr -->
    <script src="{{ asset('plugins/toastr/toastr.min.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{ asset('plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js')}}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
    <!-- Validation -->
    <script src="{{ asset('plugins/jquery-validation/additional-methods.min.js')}}"></script>
    <script src="{{ asset('plugins/jquery-validation/jquery.validate.min.js')}}"></script>
    <!-- Page specific script -->
    <script src="{{ asset('plugins/daterangepicker/daterangepicker.js')}}"></script>
    <script src="{{ asset('plugins/filterizr/jquery.filterizr.min.js')}}"></script>
    <!-- InputMask -->
    <script src="{{ asset('plugins/inputmask/datamask.js')}}"></script>
    <script src="{{ asset('plugins/moment/moment.min.js')}}"></script>
    <script src="{{ asset('plugins/inputmask/jquery.inputmask.min.js')}}"></script>
    <!-- Summernote -->
    <script src="{{ asset('plugins/summernote/summernote-bs4.js')}}"></script>
    <!-- jsGrid -->
    <script src="{{ asset('plugins/jsgrid/demos/db.js')}}"></script>
    <script src="{{ asset('plugins/jsgrid/jsgrid.min.js')}}"></script>
    <!-- Toastr Messages -->
    @if(Session('status'))
    <script>
        toastr.success("{{ session('status') }}");
    </script>
    @elseif(session('error'))
    <script>
        toastr.error("{{ session('error') }}");
    </script>
    @endif
    
    <!-- Page specific script -->
    <script>
        $(function() {
            //Initialize Select2 Elements
            $('.select2bs4').select2({
                theme: 'bootstrap4'
            })

            $('.select2').select2()

            //Date and time picker
            $('#session_start').datetimepicker({
                format: 'DD/MM/YYYY',
                icons: {
                    time: 'far fa-clock'
                }
            })
            //Date and time picker
            $('#session_end').datetimepicker({
                format: 'DD/MM/YYYY HH:mm A',
                icons: {
                    time: 'far fa-clock'
                }
            })
            //Timepicker
            $('#timepicker').datetimepicker({
            format: 'LT'
            })
        })
    </script>
    <script>
        // function SwitchTheme() {
        //   const theme = document.getElementById('themex').value
        //   document.getElementsByTagName('meta')[2].content = theme;
        // }
        $(function() {
            // Current Year in FOOTER
            const year = document.querySelector('#current-year')
            year.innerHTML = new Date().getFullYear()

            //Add text editor
            $('#compose-textarea').summernote()

            // $(document).on('click', '#email-me', function(event) {
            // var EmailNews = document.getElementById('print-box');
            // var WinEmail = window.open();
            // WinEmail.document.write(EmailNews.innerHTML);
            // location.href = "mailto:"+crescentbeatz31@gmail.com+'&subject='+HII NI SUBJECT+'&body='+Unyama tu mwaisa;
            // WinEmail.document.close();
            // });

            $(document).on('click', '#print', function(event) {
                //window.addEventListener("load", window.print());
                var prtNews = document.getElementById('print-box');
                //var WinPrint = window.open('', '', 'left=0,top=0,width=800,height=900,toolbar=0,scrollbars=0,status=0');
                var WinPrint = window.open();
                WinPrint.document.write(prtNews.innerHTML);
                WinPrint.document.close();
                WinPrint.focus();
                WinPrint.print();
                WinPrint.close();
            });
            //   $(document).on('click', '#email-me', function(event) {
            //   var prtNews = document.getElementById('print-box');
            //   var WinPrint = window.open();
            //   WinPrint.document.write(prtNews.innerHTML);
            //   WinPrint.document.close();
            //   WinPrint.focus();
            //   WinPrint.parent();
            //   WinPrint.close();
            // });

            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });

            $('.filter-container').filterizr({
                gutterPixels: 3
            });
            $('.btn[data-filter]').on('click', function() {
                $('.btn[data-filter]').removeClass('active');
                $(this).addClass('active');
            });

            $(document).on('click', '[data-toggle="lightbox"]', function(event) {
                event.preventDefault();
                $(this).ekkoLightbox({
                    alwaysShowClose: true
                });
            });

            $('#quickForm').validate({
                rules: {
                    firstname: {
                        required: true,
                    },
                    lastname: {
                        required: true,
                    },
                    email: {
                        required: true,
                        email: true,
                    },
                    phone: {
                        required: true,
                        minlength: 15
                    },
                    terms: {
                        required: true
                    },
                },
                messages: {
                    email: {
                        required: "Please enter a email address",
                        email: "Please enter a vaild email address"
                    },
                    firstname: {
                        required: "Please enter firstname",
                    },
                    lastname: {
                        required: "Please enter lastname",
                    },
                    phone: {
                        required: "Please provide phone number",
                        minlength: "Please enter a vaild phone number"
                    },
                    terms: "Please accept our terms"
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.js-error').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
            $('#ChangePwdForm').validate({
                rules: {
                    current_password: {
                        required: true,
                    },
                    new_password: {
                        required: true,
                        minlength: 5
                    },
                    new_confirm_password: {
                        required: true,
                    },
                    terms: {
                        required: true
                    },
                },
                messages: {
                    current_password: {
                        required: "Please enter your old password",
                    },
                    new_password: {
                        required: "Please provide new password",
                        minlength: "Your new password must be at least 5 characters long"
                    },
                    new_confirm_password: {
                        required: "Please comfirm new password",
                    },
                    terms: "Please accept our terms & Conditions"
                },
                errorElement: 'span',
                errorPlacement: function(error, element) {
                    error.addClass('invalid-feedback');
                    element.closest('.form-group').append(error);
                },
                highlight: function(element, errorClass, validClass) {
                    $(element).addClass('is-invalid');
                },
                unhighlight: function(element, errorClass, validClass) {
                    $(element).removeClass('is-invalid');
                }
            });
            $("#jsGrid1").jsGrid({
                height: "100%",
                width: "100%",

                sorting: true,
                paging: true,

                data: db.clients,

                fields: [
                    { name: "Name", type: "text", width: 150 },
                    { name: "Age", type: "number", width: 50 },
                    { name: "Address", type: "text", width: 200 },
                    { name: "Country", type: "select", items: db.countries, valueField: "Id", textField: "Name" },
                    { name: "Married", type: "checkbox", title: "Is Married" }
                ]
            });
        });
    </script>
</body>

</html>