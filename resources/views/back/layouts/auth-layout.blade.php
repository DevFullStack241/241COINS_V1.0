<!DOCTYPE html>
<html>

<head>
    <!-- Basic Page Info -->
    <meta charset="utf-8" />
    @section('pageTitle', isset($pageTitle) ? $pageTitle : 'Page title here')

    <!-- Site favicon -->
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('font_end/assets/images/logo241.png') }}" />
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('font_end/assets/images/logo241.png') }}" />
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('font_end/assets/images/logo241.png') }}" />

    <!-- Mobile Specific Metas -->
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

    <!-- Google Font -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap"
        rel="stylesheet" />
    <!-- CSS -->
    <link rel="stylesheet" type="text/css" href="{{ asset('back/vendors/styles/core.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('back/vendors/styles/icon-font.min.css') }}" />
    <link rel="stylesheet" type="text/css" href="{{ asset('back/vendors/styles/style.css') }}" />
    <link rel="stylesheet" href="/extra-assets/ijabo/ijabo.min.css">
    @livewireStyles
    @stack('stylesheets')

</head>

<body class="login-page">
    <div class="login-header box-shadow">
        <div class="container-fluid d-flex justify-content-between align-items-center">
            <div class="brand-logo">
                <a href="login.html">
                    <img src="{{ asset('back/vendors/images/logo.png') }}" alt="" />
                </a>
            </div>
        </div>
    </div>
    <div class="login-wrap d-flex align-items-center flex-wrap justify-content-center">
        <div class="container">
            <div class="row align-items-center">
                @yield('content')
            </div>
        </div>
    </div>
    <!-- js -->
    <script src="{{ asset('back/vendors/scripts/core.js') }}"></script>
    <script src="{{ asset('back/vendors/scripts/script.min.js') }}"></script>
    <script src="{{ asset('back/vendors/scripts/process.js') }}"></script>
    <script src="{{ asset('back/vendors/scripts/layout-settings.js') }}"></script>
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
    @livewireScripts
    @stack('scripts')

</body>

</html>
