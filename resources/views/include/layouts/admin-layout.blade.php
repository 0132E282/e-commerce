<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title> E-Shopper | Admin</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
        <link rel="stylesheet" href="{{ asset('bootstrap/fontawesome-free/css/all.min.css') }}">
        <link rel="stylesheet" href="https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css">
        <link rel="stylesheet" href="{{ asset('bootstrap/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('bootstrap/icheck-bootstrap/icheck-bootstrap.min.css') }}">
        <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
        <link rel="stylesheet" href="{{ asset('bootstrap/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
        <link rel="stylesheet" href="{{ asset('bootstrap/daterangepicker/daterangepicker.css') }}">
        <link rel="stylesheet" href="{{ asset('bootstrap/summernote/summernote-bs4.min.css') }}">
        <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}">

        @stack('link')
    </head>

    <body class="hold-transition sidebar-mini layout-fixed">
        <div class="wrapper">
            <nav class="main-header navbar navbar-expand navbar-white navbar-light">
                <x-header.header-admin />
            </nav>

            <aside class="main-sidebar sidebar-dark-primary elevation-4">
                <x-sidebar.sidebar-admin />
            </aside>

            <div class="content-wrapper">
                <div class="content-header">
                    @if (!empty($valueBread))
                        <x-breadcrumb.breadcrumb-admin :value="$valueBread ?? null" />
                    @endif
                </div>
                @yield('content')
            </div>
            @yield('modal')
            {{-- <x-modal.modal-message id="delete_message" title="xóa bản nghi" content="bạn có muốn xóa không" btnTitle="đồng ý xóa" /> --}}
            <aside class="control-sidebar control-sidebar-dark"> </aside>
        </div>

        <script src="{{ asset('bootstrap/jquery/jquery.min.js') }}"></script>
        <!-- jQuery UI 1.11.4 -->
        <script src="{{ asset('bootstrap/jquery-ui/jquery-ui.min.js') }}"></script>
        <!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <!-- Bootstrap 4 -->
        <script src="{{ asset('bootstrap/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
        <script src="{{ asset('bootstrap/chart.js/Chart.min.js') }}"></script>
        {{-- phần phụ tùy thuộc vào trang --}}
        {{-- <!-- Sparkline --> --}}
        <script src="{{ asset('bootstrap/sparklines/sparkline.js') }}"></script>
        <!-- JQVMap -->
        <script src="{{ asset('bootstrap/jqvmap/jquery.vmap.min.js') }}"></script>
        <script src="{{ asset('bootstrap/jqvmap/maps/jquery.vmap.usa.js') }}"></script>
        <!-- jQuery Knob Chart -->
        <script src="{{ asset('bootstrap/jquery-knob/jquery.knob.min.js') }}"></script>
        <!-- daterangepicker -->
        <script src="{{ asset('bootstrap/moment/moment.min.js') }}"></script>
        <script src="{{ asset('bootstrap/daterangepicker/daterangepicker.js') }}"></script>
        <!-- Tempusdominus Bootstrap 4 -->
        <script src="{{ asset('bootstrap/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

        <script src="{{ asset('bootstrap/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
        <!-- AdminLTE App -->
        <script src="{{ asset('dist/js/adminlte.js') }}"></script>
        @stack('scripts')
        <script>
            const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]');
            const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
        </script>
    </body>

</html>
