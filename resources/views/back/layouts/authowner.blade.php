<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>@yield('pageTitle')</title>
    <!-- loader-->
    <link href="{{ asset(path: 'font_end/auth/owner/assets/css/pace.min.css') }}" rel="stylesheet" />
    <script src="{{ asset(path: 'font_end/auth/owner/assets/js/pace.min.js') }}"></script>
    <!--favicon-->
   <link rel="shortcut icon" href="{{ asset('font_end/assets/images/logo241.png') }}">
    <!-- Bootstrap core CSS-->
    <link href="{{ asset(path: 'font_end/auth/owner/assets/css/bootstrap.min.css') }}" rel="stylesheet" />
    <!-- animate CSS-->
    <link href="{{ asset(path: 'font_end/auth/owner/assets/css/animate.css') }}" rel="stylesheet" type="text/css" />
    <!-- Icons CSS-->
    <link href="{{ asset(path: 'font_end/auth/owner/assets/css/icons.css') }}" rel="stylesheet" type="text/css" />
    <!-- Custom Style-->
    <link href="{{ asset(path: 'font_end/auth/owner/assets/css/app-style.css') }}" rel="stylesheet" />

    @livewireStyles
    @stack('stylesheets')

</head>

<body class="bg-theme bg-theme1">

    <!-- start loader -->
    <div id="pageloader-overlay" class="visible incoming">
        <div class="loader-wrapper-outer">
            <div class="loader-wrapper-inner">
                <div class="loader"></div>
            </div>
        </div>
    </div>
    <!-- end loader -->

    <!-- Start wrapper-->
    <div id="wrapper">

        <div class="loader-wrapper">
            <div class="lds-ring">
                <div></div>
                <div></div>
                <div></div>
                <div></div>
            </div>
        </div>
        <div class="d-flex justify-content-center align-items-center min-vh-100">
            <div class="card card-authentication1 mx-auto my-4" style="width: 400px;">
                @yield('content')
            </div>
        </div>

    </div><!--wrapper-->

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset(path: 'font_end/auth/owner/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset(path: 'font_end/auth/owner/assets/js/popper.min.js') }}"></script>
    <script src="{{ asset(path: 'font_end/auth/owner/assets/js/bootstrap.min.js') }}"></script>

    <!-- sidebar-menu js -->
    <script src="{{ asset(path: 'font_end/auth/owner/assets/js/sidebar-menu.js') }}"></script>

    <!-- Custom scripts -->
    <script src="{{ asset(path: 'font_end/auth/owner/assets/js/app-script.js') }}"></script>

    @livewireScripts
    @stack('scripts')

</body>

</html>
