<!DOCTYPE HTML>
<html lang="en">

<head>
    <!--=============== basic  ===============-->
    <meta charset="UTF-8">
    <title>Bienvenue sur 241Coins</title>
    <meta name="robots" content="index, follow" />
    <meta name="keywords" content="" />
    <meta name="description" content="" />
    <!--=============== css  ===============-->
    <link type="text/css" rel="stylesheet" href="{{ asset('font_end/assets/css/plugins.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('font_end/assets/css/style.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('font_end/assets/css/color.css') }}">
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
        @include('font_end.layout.header')
        <!-- header end  -->
        <!-- wrapper  -->
        <div id="wrapper">
            <!-- content -->
            <div class="content">
                <!--  section  -->
                @yield('content')
                <!-- section end-->
            </div>
            <!-- content end -->
            <!-- subscribe-wrap -->
            @include('font_end.layout.subscribe')
            <!-- subscribe-wrap end -->
            <!-- footer -->
            @include('font_end.layout.footer')
            <!-- footer end -->
        </div>
        <!-- wrapper end -->
        <!--register form -->

        <!--register form end -->
        <!--secondary-nav -->
        <div class="secondary-nav">
            <ul>
            </ul>
            <div class="progress-indicator">
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="-1 -1 34 34">
                    <circle cx="16" cy="16" r="15.9155" class="progress-bar__background" />
                    <circle cx="16" cy="16" r="15.9155"
                        class="progress-bar__progress 
                            js-progress-bar" />
                </svg>
            </div>
        </div>
        <!--secondary-nav end -->
        <a class="to-top color-bg"><i class="fas fa-caret-up"></i></a>
        <!--map-modal -->
        <div class="map-modal-wrap">
            <div class="map-modal-wrap-overlay"></div>
            <div class="map-modal-item">
                <div class="map-modal-container fl-wrap">
                    <h3> <span>Listing Title </span></h3>
                    <div class="map-modal-close"><i class="far fa-times"></i></div>
                    <div class="map-modal fl-wrap">
                        <div id="singleMap" data-latitude="40.7" data-longitude="-73.1"></div>
                        <div class="scrollContorl"></div>
                    </div>
                </div>
            </div>
        </div>
        <!--map-modal end -->
    </div>
    <!-- Main end -->
    <!--=============== scripts  ===============-->

    <script src="{{ asset('font_end/assets/js/jquery.min.js') }}"></script>
    <script src="{{ asset('font_end/assets/js/plugins.js') }}"></script>
    <script src="{{ asset('font_end/assets/js/scripts.js') }}"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDwJSRi0zFjDemECmFl9JtRj1FY7TiTRRo&amp;libraries=places">
    </script>
    <script src="{{ asset('font_end/assets/js/map-single.js') }}"></script>
    <script>
        if (navigator.userAgent.indexOf("Firefox") != -1) {
            history.pushState(null, null, document.URL);
            window.addEventListener('popstate', function() {
                history.pushState(null, null, document.URL);
            });
        }
    </script>
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

    <script src="https://maps.googleapis.com/maps/api/js?key={{ env('GOOGLE_MAPS_API_KEY') }}&callback=initMap" async defer>
    </script>


    @kropifyScripts
    @livewireScripts
    @stack('scripts')
</body>

<!-- Mirrored from homeradar.kwst.net/index4.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Aug 2024 00:39:49 GMT -->

</html>
