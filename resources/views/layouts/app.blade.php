<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
{{--    <title>Borisfen | Dashboard</title>--}}
    <title>@yield('title', 'Головна|') Borisfen </title>


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
          href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
{{--    <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">--}}
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('assets/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/dist/css/mycss.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/summernote/summernote-bs4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">

    <!-- Bootstrap4 Duallistbox -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bootstrap4-duallistbox/bootstrap-duallistbox.min.css') }}">
    <!-- BS Stepper -->
    <link rel="stylesheet" href="{{ asset('assets/plugins/bs-stepper/css/bs-stepper.min.css') }}">

    <link rel="stylesheet" href="{{ asset('assets/plugins/toastr/toastr.css') }}">
{{--    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">--}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-C6RzsynM9kWDrMNeT87bh95OGNyZPhcTNXj1NW7RuBCsyN/o0jlpcV8Qyq46cDfL" crossorigin="anonymous"></script>


    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>


</head>
<body class="hold-transition sidebar-mini layout-fixed">

<div class="wrapper">

    @if (session('status'))
        <script>
            $(document).ready(function() {
                toastr.success("{{ session('status') }}");
            });
        </script>
    @endif
    @if (session('error'))
        <script>
            $(document).ready(function() {
                toastr.error("{{ session('error') }}");
            });
        </script>
@endif

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
        <img class="animation__wobble" src="{{ asset('assets/dist/img/logo.svg') }}" alt="BorisfenCrmLogo" height="60" width="60">
    </div>

    <!-- Navbar -->
    <nav class="main-header navbar navbar-expand bg-custom-yellow">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">

            <li class="nav-item mr-2">
                <a class="nav-link advocate-link" href="https://advocat.ua/" target="_blank"></a>
            </li>
            <li class="nav-item mr-3">
                <a class="nav-link site-link" href="https://borisfen.net/" target="_blank"></a>
            </li>
            <li class="nav-item mr-2">
                <a class="nav-link lis-link" href="https://www.lis.borisfen.net/" target="_blank"></a>
            </li>
            <li class="nav-item mr-2">
                <a class="nav-link lms-link" href="https://lms.borisfen.net/" target="_blank"></a>
            </li>
            <li class="nav-item mr-2">
                <a class="nav-link mail-link" href="https://webmail.adm.tools/" target="_blank"></a>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-widget="navbar-search" href="#" role="button">
                    <i class="fas fa-search"></i>
                </a>
                <div class="navbar-search-block w-50" data-search-block>
                    <form class="form-inline" action="{{ route('search') }}" method="GET">
                        <div class="input-group input-group-sm">
                            <input class="form-control" type="search" name="search" placeholder="Пошук..."
                                   aria-label="Search">
                            <span class="input-group-append">
                                <button type="button" class="btn btn-info btn-flat">Пошук!</button>
                            </span>
                        </div>
                    </form>
                </div>
            </li>

            <li class="nav-item">
                <a class="nav-link" data-widget="fullscreen" href="#" role="button">
                    <i class="fas fa-expand-arrows-alt"></i>
                </a>
            </li>
        </ul>
    </nav>
    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <aside class="main-sidebar sidebar-dark-primary elevation-4 bg-custom-blue">
        <!-- Brand Logo -->
        <a href="{{ route('dashboard') }}" class="row brand-link align-items-center d-flex text-decoration-none" title="Управління відносинами з клієнтами">
            <img src="{{ asset('assets/dist/img/logo.svg') }}" height="70px" alt="AdminLTE Logo"  class="col-md-3 mr-0"
                 style="opacity: 1">
            <div class="col-md-7 mt-2">
                <p class="brand-text font-weight-light mb-0"><b style="font-size: 30px">CRM</b></p>
                <p class="brand-text font-weight-light w-100 mt-0 mb-0" style="font-size: 12px">Customer relationship management</p>
                <p class="brand-text font-weight-light text-white-75 mt-0" style="font-size: 16px;">
                    ПАНП "Борисфен"</p>
            </div>
        </a>

        <!-- Sidebar -->
        <div class="sidebar">
            <!-- Sidebar user panel (optional) -->
            <div class="user-panel mt-3 pb-3 mb-3 d-flex">
                <div class="image">
                    <img src="{{ asset('assets/dist/img/avatar5.png') }}" class="img-circle elevation-2" alt="User Image">
                </div>
                <div class="info">
                    <a href="{{ route('employee', auth()->id()) }}" class="d-block text-decoration-none">{{ Auth::user()->surname }} {{ Auth::user()->name }}</a>
                </div>
            </div>

            <!-- Sidebar Menu -->
            <nav class="mt-2">
                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                    data-accordion="false">
                    <li class="nav-item">
                        <a href="{{ route('dashboard') }}" class="nav-link">
                            <i class="nav-icon fas fa-th"></i>
                            <p>
                                Головна
                            </p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Справи
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('cases.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Відкрити справу</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('cases.index.status', 0) }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Діючи справи</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('cases.index.status', 1) }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Архів справ</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @can('consultation')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-copy"></i>
                            <p>
                                Консультації
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('consultations.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Всі консультації</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('consultations.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Нова консультація</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endcan
                    @can('visitors-all')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-chart-pie"></i>
                            <p>
                                Клієнтура
                                <i class="right fas fa-angle-left"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('visitors.index', \App\Models\Visitor::IS_GUEST) }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Відвідувачи</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('visitors.index', \App\Models\Visitor::IS_CLIENT) }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Клієнти</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endcan
                    @can('employee-all')
                    <li class="nav-item">
                        <a href="#" class="nav-link">
                            <i class="nav-icon fas fa-tree"></i>
                            <p>
                                Співробітники
                                <i class="fas fa-angle-left right"></i>
                            </p>
                        </a>
                        <ul class="nav nav-treeview">
                            <li class="nav-item">
                                <a href="{{ route('admin.employee.create') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Новий співробітник</p>
                                </a>
                            </li>
                            <li class="nav-item">
                                <a href="{{ route('admin.employee.index') }}" class="nav-link">
                                    <i class="far fa-circle nav-icon"></i>
                                    <p>Всі співробітники</p>
                                </a>
                            </li>
                        </ul>
                    </li>
                    @endcan

                    <li class="nav-item">
                        <a href="{{ route('employee', Auth::user()) }}" class="nav-link">
                            <i class="nav-icon far fa-circle text-info"></i>
                            <p>Мій профіль</p>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-danger" href="{{ route('logout') }}"
                           onclick="event.preventDefault();
                               document.getElementById('logout-form').submit();"
                        >
                            <i class="nav-icon fas fa-sign-out-alt"></i>
                            <p>Вийти</p>
                        </a>
                    </li>
                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                        @csrf
                    </form>
                </ul>
            </nav>
        </div>
    </aside>
    <div class="content-wrapper bg-white pt-3">
        @yield('content')
    </div>

    <footer class="main-footer bg-custom-blue d-flex justify-content-between">
        <strong  style="color: white">Copyright &copy; 2023 @if(\Carbon\Carbon::now()->year > '2023'){{ '- ' . \Carbon\Carbon::now()->year}} @endif <a href="https://www.borisfen.net/" target="_blank">ПАНП «Борисфен»</a></strong>
        <strong><a href="{{ route('policy') }}">Політика конфіденційності</a></strong>
        <strong><a href="{{ route('about') }}">Про систему</a></strong>

        <div class="float-right d-none d-sm-inline-block" style="color: white">
            <b>Version</b> 1.0.0
        </div>
    </footer>

    <aside class="control-sidebar control-sidebar-dark">

    </aside>
</div>

<script src="{{ asset('assets/js/main.js') }}"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<!-- jQuery -->
<script src="{{ asset('assets/plugins/jquery/jquery.min.js') }}"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ asset('assets/plugins/jquery-ui/jquery-ui.min.js') }}"></script>
<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
<script>
    $.widget.bridge('uibutton', $.ui.button)
</script>
<!-- Bootstrap 4 -->
<script src="{{ asset('assets/plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
<!-- ChartJS -->
{{--<script src="plugins/chart.js/Chart.min.js"></script>--}}
{{--<!-- Sparkline -->--}}
{{--<script src="plugins/sparklines/sparkline.js"></script>--}}
{{--<!-- JQVMap -->--}}
{{--<script src="plugins/jqvmap/jquery.vmap.min.js"></script>--}}
{{--<script src="plugins/jqvmap/maps/jquery.vmap.usa.js"></script>--}}
{{--<!-- jQuery Knob Chart -->--}}
{{--<script src="plugins/jquery-knob/jquery.knob.min.js"></script>--}}
<!-- Bootstrap4 Duallistbox -->
<script src="{{ asset('assets/plugins/bootstrap4-duallistbox/jquery.bootstrap-duallistbox.min.js') }}"></script>
<!-- Select2 -->
<script src="{{ asset('assets/plugins/select2/js/select2.full.min.js') }}"></script>
<!-- daterangepicker -->
<script src="{{ asset('assets/plugins/moment/moment.min.js') }}"></script>
<script src="{{ asset('assets/plugins/inputmask/jquery.inputmask.min.js') }}"></script>
<script src="{{ asset('assets/plugins/daterangepicker/daterangepicker.js') }}"></script>
<!-- Tempusdominus Bootstrap 4 -->
<script src="{{ asset('assets/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
<!-- Summernote -->
<script src="{{ asset('assets/plugins/summernote/summernote-bs4.min.js') }}"></script>
<!-- Bootstrap Switch -->
<script src="{{ asset('assets/plugins/bootstrap-switch/js/bootstrap-switch.min.js') }}"></script>
<!-- BS-Stepper -->
<script src="{{ asset('assets/plugins/bs-stepper/js/bs-stepper.min.js') }}"></script>
<!-- overlayScrollbars -->
<script src="{{ asset('assets/plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('assets/dist/js/adminlte.min.js') }}"></script>
<!-- bootstrap color picker -->
<script src="{{ asset('assets/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.min.js') }}"></script>

<script src="{{ asset('assets/plugins/toastr/toastr.min.js') }}"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
<script>

    const popoverTriggerList = document.querySelectorAll('[data-bs-toggle="popover"]')
    const popoverList = [...popoverTriggerList].map(popoverTriggerEl => new bootstrap.Popover(popoverTriggerEl))

    $(function () {
        //Initialize Select2 Elements
        $('.select2').select2()

        //Initialize Select2 Elements
        $('.select2bs4').select2({
            theme: 'bootstrap4'
        })
    })

</script>
</body>
</html>
