
<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon" />
    <title>Sign In | PlainAdmin Demo</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="{{ asset('font_end/auth/client/assets/css/bootstrap.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('font_end/auth/client/assets/css/lineicons.css')}}" />
    <link rel="stylesheet" href="{{ asset('font_end/auth/client/assets/css/materialdesignicons.min.css')}}" />
    <link rel="stylesheet" href="{{ asset('font_end/auth/client/assets/css/fullcalendar.css')}}" />
    <link rel="stylesheet" href="{{ asset('font_end/auth/client/assets/css/main.css')}}" />
    @livewireStyles
    @stack('stylesheets')
  </head>
  <body>
    <!-- ======== Preloader =========== -->
    <div id="preloader">
      <div class="spinner"></div>
    </div>
    <!-- ======== Preloader =========== -->

    <!-- ======== sidebar-nav start =========== -->
    
    
    <!-- ======== sidebar-nav end =========== -->

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
      <!-- ========== signin-section start ========== -->
      <section class="signin-section">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              
              <!-- end col -->
              <div class="col-md-6">
                <div class="breadcrumb-wrapper">
                </div>
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
          <!-- ========== title-wrapper end ========== -->
            @yield('content')
        </div>
      </section>
      <!-- ========== signin-section end ========== -->
    </main>
    <!-- ======== main-wrapper end =========== -->

    <!-- ========= All Javascript files linkup ======== -->
    <script src="{{ asset('font_end/auth/client/assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ asset('font_end/auth/client/assets/js/Chart.min.js')}}"></script>
    <script src="{{ asset('font_end/auth/client/assets/js/dynamic-pie-chart.js')}}"></script>
    <script src="{{ asset('font_end/auth/client/assets/js/moment.min.js')}}"></script>
    <script src="{{ asset('font_end/auth/client/assets/js/fullcalendar.js')}}"></script>
    <script src="{{ asset('font_end/auth/client/assets/js/jvectormap.min.js')}}"></script>
    <script src="{{ asset('font_end/auth/client/assets/js/world-merc.js')}}"></script>
    <script src="{{ asset('font_end/auth/client/assets/js/polyfill.js')}}"></script>
    <script src="{{ asset('font_end/auth/client/assets/js/main.js')}}"></script>
    @livewireScripts
    @stack('scripts')
  </body>
</html>
