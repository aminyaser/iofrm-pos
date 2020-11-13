<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<!-- Scripts -->
{{-- <script src="{{ asset('js/app.js') }}" defer></script> --}}
{{-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> --}}

<head>
    <meta charset="utf-8">
    <!-- CSRF Token -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Pos') }}</title>
    {{-- <title>| Dashboard</title> --}}
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{url('dashboard_files/css/all.min.css')}}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
    <!-- Tempusdominus Bbootstrap 4 -->
    <link rel="stylesheet" href="{{url('dashboard_files/css/tempusdominus-bootstrap-4.min.css')}}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{url('dashboard_files/css/icheck-bootstrap.min.css')}}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{url('dashboard_files/css/jqvmap.min.css')}}">
    <!-- Theme style -->
    <!-- Select2 -->
    <link rel="stylesheet" href="{{url('dashboard_files/css/select2.min.css')}}">
    <!-- Select2  -->
    <link rel="stylesheet" href="{{url('dashboard_files/css/adminlte.min.css')}}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{url('dashboard_files/css/OverlayScrollbars.min.css')}}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{url('dashboard_files/css/daterangepicker.css')}}">
    <!-- summernote -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    {{-- <link rel="stylesheet" href="{{url('css/summernote-bs4.css')}}"> --}}
    <!-- Google Font: Source Sans Pro -->
    <link href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700" rel="stylesheet">

    {{--morris--}}
    <link rel="stylesheet" href="{{ asset('dashboard_files/js/morris/morris.css') }}">
    <!-- DataTables -->
    <link rel="stylesheet" href="{{url('dashboard_files/css/dataTables.bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{url('dashboard_files/css/responsive.bootstrap4.min.css')}}">

    <style>
        .mr-2 {
            margin-right: 5px;
        }

        .loader {
            border: 5px solid #f3f3f3;
            border-radius: 50%;
            border-top: 5px solid #367FA9;
            width: 60px;
            height: 60px;
            -webkit-animation: spin 1s linear infinite;
            /* Safari */
            animation: spin 1s linear infinite;
        }

        /* Safari */
        @-webkit-keyframes spin {
            0% {
                -webkit-transform: rotate(0deg);
            }

            100% {
                -webkit-transform: rotate(360deg);
            }
        }

        @keyframes spin {
            0% {
                transform: rotate(0deg);
            }

            100% {
                transform: rotate(360deg);
            }
        }
    </style>
    <style>
        @font-face {
            src: url(/dashboard_files/webfonts/Tajawal-Light.ttf);
            font-family: font1
        }

            {
            font-family: font1;
        }
    </style>
    <!-- Theme style -->
    @if (app()->getLocale() == 'ar')

    <style>
        label,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        p,
        input,
        .form-group {
            /* text-align: right ; */
            font-family: 'font1';
        }
    </style>

    @else
    <style>
        * {
            /* text-align: left; */
        }
    </style>
    @endif
</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">

        @include('layoutsDashboard.includesDashboard.navbar')
        <main class="py-4">
            @include('partials._session')
            @yield('content')
        </main>
        @include('layoutsDashboard.includesDashboard.footer')

    </div>

    <!-- jQuery -->
    <script src="{{url('dashboard_files/js/jquery.min.js')}}"></script>
    <!-- jQuery UI 1.11.4 -->

    <!-- DataTables -->
    <script src="{{url('dashboard_files/js/jquery.dataTables.min.js')}}"></script>

    <script src="{{url('dashboard_files/js/dataTables.bootstrap4.min.js')}}"></script>

    <script src="{{url('dashboard_files/js/dataTables.responsive.min.js')}}"></script>

    <script src="{{url('dashboard_files/js/responsive.bootstrap4.min.js')}}"></script>

    <script src="{{url('dashboard_files/js/jquery-ui.min.js')}}"></script>
    <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>
    <!-- Bootstrap 4 -->
    <script src="{{url('dashboard_files/js/bootstrap.bundle.min.js')}}"></script>
    <!-- ChartJS -->

{{--morris --}}
<script src="https://cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
<script src="{{ asset('dashboard_files/js/morris/morris.min.js') }}"></script>

    <!-- Sparkline -->
    <script src="{{url('dashboard_files/js/sparkline.js')}}"></script>

    <!-- jQuery Knob Chart -->
    <script src="{{url('dashboard_files/js/jquery.knob.min.js')}}"></script>
    <!-- daterangepicker -->
    <script src="{{url('dashboard_files/js/moment.min.js')}}"></script>
    <script src="{{url('dashboard_files/js/daterangepicker.js')}}"></script>
    <!-- Tempusdominus Bootstrap 4 -->
    <script src="{{url('dashboard_files/js/tempusdominus-bootstrap-4.min.js')}}"></script>

    <script src="{{url('dashboard_files/ckeditor/ckeditor.js')}}"></script>
    <!-- overlayScrollbars -->
    <script src="{{url('dashboard_files/js/jquery.overlayScrollbars.min.js')}}"></script>
    <!-- AdminLTE App -->
    <script src="{{url('dashboard_files/js/adminlte.js')}}"></script>
    <!-- AdminLTE dashboard demo (This is only for demo purposes) -->
    <script src="{{url('dashboard_files/js/dashboard.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{url('dashboard_files/js/demo.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{url('dashboard_files/js/select2.full.min.js')}}"></script>
    <!-- AdminLTE for demo purposes -->
    <script src="{{url('dashboard_files/js/jquery.number.min.js')}}"></script>
    <!-- AdminLTE for costum -->
    <script src="{{url('dashboard_files/js/custom/main.js')}}"></script>
    <!-- AdminLTE for print this -->
    <script src="{{url('dashboard_files/js/printThis.js')}}"></script>



    <script>
        $(document).ready(function() {
            $("#success-alert").fadeOut(2000);
        });
    </script>
    <script>
        $(function() {
            $("#example1").DataTable({
                "responsive": true,
                "autoWidth": false,
            });
            $('#example2').DataTable({
                "paging": true,
                "lengthChange": false,
                "searching": false,
                "ordering": true,
                "info": true,
                "autoWidth": false,
                "responsive": true,
            });
        });
    </script>
    <script>
        $(".image").change(function() {
            if (this.files && this.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    $('.img-preview').attr('src', e.target.result);
                }

                reader.readAsDataURL(this.files[0]); // convert to base64 string
            }
        });
        CKEDITOR.config.language = "{{ app()->getLocale() }}";

        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        $('.delete-confirm').on('click', function(event) {
            event.preventDefault();
            //   const url = $(this).attr('href');
            swal({
                title: '@lang("site.Are_you_sure")',
                text: '@lang("site.This record and it`s details will be permanantly deleted!")',
                icon: 'warning',
                buttons: ["@lang('site.cancle')", "@lang('site.yes')"],
            }).then(function(value) {
                if (value) {
                    $('.delete-confirm').closest('form').submit();
                }
            });
        });
    </script>

    <script>
        $('.delete-confirm').on('click', function(event) {
            event.preventDefault();
            //   const url = $(this).attr('href');
            swal({
                title: '@lang("site.Are_you_sure")',
                text: '@lang("site.This record and it`s details will be permanantly deleted!")',
                icon: 'warning',
                buttons: ["@lang('site.cancle')", "@lang('site.yes')"],
            }).then(function(value) {
                if (value) {
                    $('.delete-confirm').closest('form').submit();
                }
            });
        });
    </script>
    @stack('scripts')

</body>

</html>
