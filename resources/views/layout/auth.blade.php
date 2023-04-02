<!doctype html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>{{ config('app.name', 'TMS') }}</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="Tracking Management System Platform" name="description" />
    <meta content="Nordic Solutions Asia" name="author" />

    <meta content='width=device-width, initial-scale=1' user-scalable='no' name='viewport' />
    <!-- App favicon -->
    <link rel="shortcut icon" href="{{ asset('assets/images/favicon.ico') }}">

    <!-- Bootstrap Css -->
    <link href="{{ asset('assets/css/bootstrap.min.css') }}" id="bootstrap-style" rel="stylesheet" type="text/css" />
    <!-- Icons Css -->
    <link href="{{ asset('assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App Css-->
    <link href="{{ asset('assets/css/app.min.css') }}" id="app-style" rel="stylesheet" type="text/css" />

    @stack('css')
</head>

<body data-topbar="dark" class="vertical-collpsed">

    <!-- Begin page -->
    <div id="layout-wrapper">

        <!-- Navbar Section -->
        @include('layout/components/topbar')

        <!-- ========== Left Sidebar Start ========== -->
        @include('layout/components/navbar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start right Content here -->
        <!-- ============================================================== -->
        <div class="main-content">

            <div class="page-content">
                <div class="container-fluid">

                    <!-- start content -->
                    @yield('content')
                    <!-- end content -->

                </div> <!-- container-fluid -->
            </div>
            <!-- End Page-content -->

        </div>
        <!-- end main content-->

    </div>
    <!-- END layout-wrapper -->

    <!-- JAVASCRIPT -->
    <script src="{{ asset('assets/libs/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('assets/libs/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/libs/metismenu/metisMenu.min.js') }}"></script>
    <script src="{{ asset('assets/libs/simplebar/simplebar.min.js') }}"></script>
    <script src="{{ asset('assets/libs/node-waves/waves.min.js') }}"></script>
    <script src="{{ asset('assets/libs/jquery-sparkline/jquery.sparkline.min.js') }}"></script>

    <!-- App js -->
    <script src="{{ asset('assets/js/app.js') }}"></script>

    <script type="text/javascript">
        document.addEventListener('keydown', function(event) {
            if (event.ctrlKey === true && (event.key === '+' || event.key === '-' || event.key === '=')) {
                event.preventDefault();
            }
        });

        window.addEventListener('wheel', function(e) {
            if (e.ctrlKey) {
                e.preventDefault();
            }
        }, {
            passive: false
        });
    </script>

    <script>
        function logout() {
            document.getElementById('form-logout').submit();
        }
    </script>



    <!-- Page Js -->
    @stack('script')
</body>

</html>