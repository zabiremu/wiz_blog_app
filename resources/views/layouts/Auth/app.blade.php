<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <title>Log In | UBold - Responsive Admin Dashboard Template</title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta content="A fully featured admin theme which can be used to build CRM, CMS, etc." name="description" />
    <meta content="Coderthemes" name="author" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <!-- App favicon -->
    <link rel="shortcut icon" href="assets/images/favicon.ico">

    <!-- Bootstrap css -->
    <link href="{{asset('admin/assets/css/bootstrap.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- App css -->
    <link href="{{asset('admin/assets/css/app.min.css')}}" rel="stylesheet" type="text/css" id="app-style" />
    <!-- icons -->
    <link href="{{asset('admin/assets/css/icons.min.css')}}" rel="stylesheet" type="text/css" />
    <!-- Head js -->
    <script src="{{asset('admin/assets/js/head.js')}}"></script>

</head>

<body class="authentication-bg authentication-bg-pattern">

    @yield('content')
    <!-- end page -->

    <!-- Vendor js -->
    <script src="{{asset('admin/assets/js/vendor.min.js')}}"></script>

    <!-- App js -->
    <script src="{{asset('admin/assets/js/app.min.js')}}"></script>

</body>

</html>
