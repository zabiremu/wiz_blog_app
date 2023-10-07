<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8" />
    <title>Dashboard | UBold - Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Plugins css -->
    <link href="{{ asset('admin/assets/libs/flatpickr/flatpickr.min.css') }}" rel="stylesheet" type="text/css" />
    <link href="{{ asset('admin/assets/libs/selectize/css/selectize.bootstrap3.css') }}" rel="stylesheet"
        type="text/css" />

    <!-- Bootstrap css -->
    <link href="{{ asset('admin/assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- App css -->
    <link href="{{ asset('admin/assets/css/app.min.css') }}" rel="stylesheet" type="text/css" id="app-style" />
    <!-- icons -->
    <link href="{{ asset('admin/assets/css/icons.min.css') }}" rel="stylesheet" type="text/css" />
    <!-- Head js -->
    <script src="{{ asset('admin/assets/js/head.js') }}"></script>

    @stack('customCss')
</head>

<!-- body start -->

<body data-layout-mode="default" data-theme="light" data-topbar-color="dark" data-menu-position="fixed"
    data-leftbar-color="light" data-leftbar-size='default' data-sidebar-user='false'>

    <!-- Begin page -->
    <div id="wrapper">


        <!-- Topbar Start -->
        @include('layouts.Admin.partials.header')
        <!-- end Topbar -->

        <!-- ========== Left Sidebar Start ========== -->
        @include('layouts.Admin.partials.sidebar')
        <!-- Left Sidebar End -->

        <!-- ============================================================== -->
        <!-- Start Page Content here -->
        <!-- ============================================================== -->

        <div class="content-page">
            <div class="content">

                <!-- Start Content-->
                <div class="container-fluid">

                    @yield('content')

                </div> <!-- container -->

            </div> <!-- content -->

            <!-- Footer Start -->
            @include('layouts.Admin.partials.footer')
            <!-- end Footer -->

        </div>

        <!-- ============================================================== -->
        <!-- End Page content -->
        <!-- ============================================================== -->


    </div>
    <!-- END wrapper -->

    <!-- Vendor js -->
    <script src="{{ asset('admin/assets/js/vendor.min.js') }}"></script>

    <!-- Plugins js-->
    <script src="{{ asset('admin/assets/libs/flatpickr/flatpickr.min.js') }}"></script>
    <script src="{{ asset('admin/assets/libs/apexcharts/apexcharts.min.js') }}"></script>

    <script src="{{ asset('admin/assets/libs/selectize/js/standalone/selectize.min.js') }}"></script>

    <!-- Dashboar 1 init js-->
    <script src="{{ asset('admin/assets/js/pages/dashboard-1.init.js') }}"></script>

    <!-- App js-->
    <script src="{{ asset('admin/assets/js/app.min.js') }}"></script>

    <!-- Sweet Alert js-->
    <script src="{{ asset('admin/assets/js/sweet-alert.js') }}"></script>

    @if (Session::has('success'))
        <script>
            const Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 3000,
                timerProgressBar: true,
                didOpen: (toast) => {
                    toast.addEventListener('mouseenter', Swal.stopTimer)
                    toast.addEventListener('mouseleave', Swal.resumeTimer)
                }
            })

            Toast.fire({
                icon: 'success',
                title: `{{ Session::get('success') }}`
            })
        </script>
    @endif

    @stack('customJs')
</body>

</html>
