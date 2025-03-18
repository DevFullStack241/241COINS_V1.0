<!DOCTYPE HTML>
<html lang="en">

<!-- Mirrored from homeradar.kwst.net/dark/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Aug 2024 00:40:39 GMT -->

<head>
    <!--=============== basic  ===============-->
    <meta charset="UTF-8">
    <title>
        @yield('pageTitle')
    </title>


    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />

    <meta name="csrf-token" content="{{ csrf_token() }}">
    <!--=============== css  ===============-->
    <link type="text/css" rel="stylesheet" href="{{ asset('back/owner/vendor/css/plugins.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('back/owner/vendor/css/style.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('back/owner/vendor/css/dashboard-style.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('back/owner/vendor/css/dark-style.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('back/owner/vendor/css/color.css') }}">


    <!--=============== favicons ===============-->
    <link rel="shortcut icon" href="{{ asset('font_end/assets/images/logo241.png') }}">
    <script>
        (function(w, d, s, l, i) {
            w[l] = w[l] || [];
            w[l].push({
                "gtm.start": new Date().getTime(),
                event: "gtm.js"
            });
            var f = d.getElementsByTagName(s)[0],
                j = d.createElement(s),
                dl = l != "dataLayer" ? "&l=" + l : "";
            j.async = true;
            j.src = "https://www.googletagmanager.com/gtm.js?id=" + i + dl;
            f.parentNode.insertBefore(j, f);
        })(window, document, "script", "dataLayer", "GTM-NXZMQSS");
    </script>
    <!-- End Google Tag Manager -->
    <link rel="stylesheet" href="/extra-assets/ijabo/ijabo.min.css">
    <link rel="stylesheet" href="/extra-assets/ijaboCropTool/ijaboCropTool.min.css">
    <link rel="stylesheet" href="/extra-assets/jquery-ui-1.13.2/jquery-ui.min.css">
    <link rel="stylesheet" href="/extra-assets/jquery-ui-1.13.2/jquery-ui.structure.min.css">
    <link rel="stylesheet" href="/extra-assets/jquery-ui-1.13.2/jquery-ui.theme.min.css">
    <link rel="stylesheet" href="/extra-assets/summernote/summernote-bs4.min.css">
    <style>
        .swal2-popup {
            font-size: 0.78em;
        }
    </style>
    @kropifyStyles
    @livewireStyles
    @stack('stylesheets')
</head>

<body>
    <!--loader-->
    <div class="loader-wrap">
        <div class="loader-inner">
            <svg>
                <defs>
                    <filter id="goo">
                        <fegaussianblur in="SourceGraphic" stdDeviation="2" result="blur" />
                        <fecolormatrix in="blur" values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 5 -2"
                            result="gooey" />
                        <fecomposite in="SourceGraphic" in2="gooey" operator="atop" />
                    </filter>
                </defs>
            </svg>
        </div>
    </div>
    <!--loader end-->
    <!-- main -->
    <div id="main">
        <!-- header -->
        <header class="main-header">
            <!--  logo  -->
            <div class="logo-holder"><a href="index.html"><img src="images/logo.png" alt=""></a></div>
            <!-- logo end  -->
            <!-- nav-button-wrap-->
            <div class="nav-button-wrap color-bg nvminit">
                <div class="nav-button">
                    <span></span><span></span><span></span>
                </div>
            </div>
        </header>
        <!-- header end  -->
        <!-- wrapper  -->
        <div id="wrapper">
            <!-- dashbard-menu-wrap -->
            <div class="dashbard-menu-overlay"></div>
            <div class="dashbard-menu-wrap">
                <div class="dashbard-menu-close"><i class="fal fa-times"></i></div>
                <div class="dashbard-menu-container">
                    <!-- user-profile-menu-->
                    <div class="user-profile-menu">
                        <h3>Menu</h3>
                        <ul class="no-list-style">
                            <li><a href="{{ route('owner.home') }}"
                                    class="dropdown-toggle no-arrow {{ Route::is('owner.home') ? 'active' : '' }}"><i
                                        class="fal fa-chart-line"></i>Tableau de bord</a>
                            </li>
                            <li><a href="{{ route('owner.profile') }} " class="dropdown-toggle no-arrow"><i
                                        class="fal fa-user-edit {{ Route::is('owner.profile') ? 'active' : '' }}"></i>Profil</a>
                            </li>
                            <li><a href="{{ route('owner.etablishment.index') }}"><i class="fal fa-th-list"></i> Mes
                                    établissements
                                </a>
                            </li>
                        </ul>
                    </div>
                    <!-- user-profile-menu end-->
                </div>
                <div class="#"></div>
            </div>
            <!-- dashbard-menu-wrap end  -->
            <!-- content -->
            <div class="dashboard-content">
                @yield('content')
                <!-- dashboard-footer -->
                <div class="dashboard-footer">
                    <div class="dashboard-footer-links fl-wrap">
                        <span></span>
                        <ul>

                        </ul>
                    </div>
                    <a href="#" class="dashbord-totop  custom-scroll-link"><i class="fas fa-caret-up"></i></a>
                </div>
                <!-- dashboard-footer end -->
            </div>
            <!-- content end -->
            <div class="dashbard-bg gray-bg"></div>
        </div>
        <!-- wrapper end -->
    </div>
    <!-- Main end -->
    <!--=============== scripts  ===============-->
    <script src="{{ asset('back/owner/vendor/js/jquery.min.js') }}"></script>
    <script src="{{ asset('back/owner/vendor/js/plugins.js') }}"></script>
    <script src="{{ asset('back/owner/vendor/js/scripts.js') }}"></script>
    <script src="{{ asset('back/owner/vendor/js/charts.js') }}"></script>
    <script src="{{ asset('back/owner/vendor/js/dashboard.js') }}"></script>
    <script>
        if (navigator.userAgent.indexOf("Firefox") != -1) {
            history.pushState(null, null, document.URL);
            window.addEventListener('popstate', function() {
                history.pushState(null, null, document.URL);
            });
        }
    </script>

    <script src="/extra-assets/ijabo/ijabo.min.js"></script>
    <script src="/extra-assets/ijabo/jquery.ijaboViewer.min.js"></script>
    <script src="/extra-assets/ijaboCropTool/ijaboCropTool.min.js"></script>
    <script src="/extra-assets/jquery-ui-1.13.2/jquery-ui.min.js"></script>
    <script src="/extra-assets/summernote/summernote-bs4.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.summernote').summernote({
                height: 200
            });
        });
    </script>

    <script>
        window.addEventListener('showToastr', function(event) {
            toastr.remove();
            if (event.detail[0].type === 'info') {
                toastr.info(event.detail[0].message);
            } else if (event.detail[0].type === 'success') {
                toastr.success(event.detail[0].message);
            } else if (event.detail[0].type === 'error') {
                toastr.error(event.detail[0].message);
            } else if (event.detail[0].type === 'warning') {
                toastr.warning(event.detail[0].message);
            } else {
                return false;
            }
        });
    </script>

    <script>
        function initMap() {
            var mapElement = document.getElementById('singleMap');
            var latitude = parseFloat(mapElement.getAttribute('data-latitude'));
            var longitude = parseFloat(mapElement.getAttribute('data-longitude'));

            var map = new google.maps.Map(mapElement, {
                zoom: 12, // Ajuste le zoom selon tes besoins
                center: {
                    lat: latitude,
                    lng: longitude
                }
            });

            var marker = new google.maps.Marker({
                position: {
                    lat: latitude,
                    lng: longitude
                },
                map: map,
                title: mapElement.getAttribute('data-maptitle')
            });
        }
    </script>

    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async
        defer></script>
    <!-- Google Tag Manager (noscript) -->
    @kropifyScripts
    @livewireScripts
    @stack('scripts')
</body>

<!-- Mirrored from homeradar.kwst.net/dark/dashboard.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Aug 2024 00:40:39 GMT -->

</html>
