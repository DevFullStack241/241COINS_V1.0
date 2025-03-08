
<!DOCTYPE HTML>
<html lang="en">
    
<!-- Mirrored from homeradar.kwst.net/dashboard-myprofile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Aug 2024 00:40:19 GMT -->
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
    <link type="text/css" rel="stylesheet" href="{{ asset('back/client/vendor/css/plugins.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('back/client/vendor/css/style.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('back/client/vendor/css/dashboard-style.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('back/client/vendor/css/dark-style.css') }}">
    <link type="text/css" rel="stylesheet" href="{{ asset('back/client/vendor/css/color.css') }}">
    <!--=============== favicons ===============-->
    <link rel="shortcut icon" href="{{ asset('back/client/vendor/images/favicon.ico') }}">
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
    <body>
        <!--loader-->
        <div class="loader-wrap">
            <div class="loader-inner">
                <svg>
                    <defs>
                        <filter id="goo">
                            <fegaussianblur in="SourceGraphic" stdDeviation="2" result="blur" />
                            <fecolormatrix in="blur"   values="1 0 0 0 0  0 1 0 0 0  0 0 1 0 0  0 0 0 5 -2" result="gooey" />
                            <fecomposite in="SourceGraphic" in2="gooey" operator="atop"/>
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
            <!-- dashbard-menu-wrap -->
            <div class="dashbard-menu-overlay"></div>
            <div class="dashbard-menu-wrap">
                <div class="dashbard-menu-close"><i class="fal fa-times"></i></div>
                <div class="dashbard-menu-container">
                    <!-- user-profile-menu-->
                    <div class="user-profile-menu">
                        <h3>Main</h3>
                        <ul class="no-list-style">
                            <li><a href="{{ route('client.home') }}"
                                    class="dropdown-toggle no-arrow {{ Route::is('client.home') ? 'active' : '' }}"><i
                                        class="fal fa-chart-line"></i>Dashboard</a>
                            </li>
                            <li><a href="{{ route('client.profile') }} " class="dropdown-toggle no-arrow"><i
                                        class="fal fa-user-edit {{ Route::is('client.profile') ? 'active' : '' }}"></i>Profil</a>
                            </li>
                        </ul>
                    </div>
                    <!-- user-profile-menu end-->
                    <!-- user-profile-menu-->
                    <div class="user-profile-menu">
                        <h3>Listings</h3>
                        <ul class="no-list-style">
                            <li><a href=""><i class="fal fa-th-list"></i> Mes
                                    établissements
                                </a>
                            </li>
                            <li><a href="dashboard-review.html"><i class="fal fa-comments-alt"></i> Reviews </a></li>
                            <li><a href="dashboard-add-listing.html"><i class="fal fa-file-plus"></i> Add New</a></li>
                        </ul>
                    </div>
                    <!-- user-profile-menu end-->
                </div>
                <div class="dashbard-menu-footer"> &#169; Homeradar 2022 . All rights reserved.</div>
            </div>
            <!-- dashbard-menu-wrap end  -->
            <!-- content -->
            <div class="dashboard-content">
                @yield('content')
                <!-- dashboard-footer -->
                <div class="dashboard-footer">
                    <div class="dashboard-footer-links fl-wrap">
                        <span>Helpfull Links:</span>
                        <ul>
                            <li><a href="about.html">About </a></li>
                            <li><a href="blog.html">Blog</a></li>
                            <li><a href="pricing.html">Pricing Plans</a></li>
                            <li><a href="contacts.html">Contacts</a></li>
                            <li><a href="help.html">Help Center</a></li>
                        </ul>
                    </div>
                    <a href="#main" class="dashbord-totop  custom-scroll-link"><i class="fas fa-caret-up"></i></a>
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
    <script src="{{ asset('back/client/vendor/js/jquery.min.js') }}"></script>
    <script src="{{ asset('back/client/vendor/js/plugins.js') }}"></script>
    <script src="{{ asset('back/client/vendor/js/scripts.js') }}"></script>
    <script src="{{ asset('back/client/vendor/js/charts.js') }}"></script>
    <script src="{{ asset('back/client/vendor/js/dashboard.js') }}"></script>
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
    <!-- Google Tag Manager (noscript) -->
    @kropifyScripts
    @livewireScripts
    @stack('scripts')
    </body>

<!-- Mirrored from homeradar.kwst.net/dashboard-myprofile.html by HTTrack Website Copier/3.x [XR&CO'2014], Tue, 13 Aug 2024 00:40:19 GMT -->
</html>