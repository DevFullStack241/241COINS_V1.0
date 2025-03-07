<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <title>Landing Page</title>
    <meta name="description" content="">
    <meta name="keywords" content="">

    <!-- Favicons -->
    <link href="{{ asset('font_end/assets/images/logo241.png') }}" rel="icon">
    <link href="{{ asset('font_end/assets/images/logo241.png') }}" rel="apple-touch-icon">

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com" rel="preconnect">
    <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
    <link
        href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Poppins:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&display=swap"
        rel="stylesheet">

    <!-- Vendor CSS Files -->
    <link href="{{ asset(path: 'font_end/landing/assets/vendor/bootstrap/css/bootstrap.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font_end/landing/assets/vendor/bootstrap-icons/bootstrap-icons.css') }}" rel="stylesheet">
    <link href="{{ asset('font_end/landing/assets/vendor/aos/aos.css') }}" rel="stylesheet">
    <link href="{{ asset('font_end/landing/assets/vendor/glightbox/css/glightbox.min.css') }}" rel="stylesheet">
    <link href="{{ asset('font_end/landing/assets/vendor/swiper/swiper-bundle.min.css') }}" rel="stylesheet">

    <!-- Main CSS File -->
    <link href="{{ asset('font_end/landing/assets/css/main.css') }}" rel="stylesheet">

    <!-- =======================================================
  * Template Name: OnePage
  * Template URL: https://bootstrapmade.com/onepage-multipurpose-bootstrap-template/
  * Updated: Aug 07 2024 with Bootstrap v5.3.3
  * Author: BootstrapMade.com
  * License: https://bootstrapmade.com/license/
  ======================================================== -->
</head>

<body class="index-page">

    <header id="header" class="header d-flex align-items-center sticky-top">
        <div class="container-fluid container-xl position-relative d-flex align-items-center">
            <a href="index.html" class="logo d-flex align-items-center me-auto">
            </a>
            <nav id="navmenu" class="navmenu">
                <ul>
                </ul>
                <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
            </nav>
        </div>
    </header>

    <main class="main">

        <!-- Hero Section -->
        <section id="hero" class="hero section">

            <img src="{{ asset('font_end/landing/assets/img/hero-bg-abstract.jpg') }}" alt="" data-aos="fade-in"
                class="">

            <div class="container">
                <div class="row justify-content-center" data-aos="zoom-out">
                    <div class="col-xl-7 col-lg-9 text-center">
                        <h1>Bienvenue dans votre espace de connexion</h1>
                    </div>
                </div>

                <div class="row gy-4 mt-5 justify-content-center">
                    <div class="col-md-6 col-lg-5" data-aos="zoom-out" data-aos-delay="200">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-person"></i></div>
                            <h4 class="title"><a href="{{ route('client.login') }}">Compte Client</a></h4>
                            <p class="description">Découvrez et réservez les meilleurs établissements en quelques clics.
                                Profitez d'une expérience unique et partagez vos avis pour aider la communauté.</p>
                        </div>
                    </div><!--End Icon Box -->

                    <div class="col-md-6 col-lg-5" data-aos="zoom-out" data-aos-delay="300">
                        <div class="icon-box">
                            <div class="icon"><i class="bi bi-buildings"></i></div>
                            <h4 class="title"><a href="{{ route('owner.login') }}">Compte Propriétaire</a>
                            </h4>
                            <p class="description justify-text">Développez votre activité en ligne, attirez plus de
                                clients et gérez
                                votre établissement en toute simplicité. Votre succès commence ici !</p>
                        </div>
                    </div><!--End Icon Box -->
                </div>


        </section><!-- /Hero Section -->



    </main>



    <!-- Scroll Top -->
    <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i
            class="bi bi-arrow-up-short"></i></a>

    <!-- Preloader -->
    <div id="preloader"></div>

    <!-- Vendor JS Files -->
    <script src="{{ asset('font_end/landing/assets/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('font_end/landing/assets/vendor/php-email-form/validate.js') }}"></script>
    <script src="{{ asset('font_end/landing/assets/vendor/aos/aos.js') }}"></script>
    <script src="{{ asset('font_end/landing/assets/vendor/purecounter/purecounter_vanilla.js') }}"></script>
    <script src="{{ asset('font_end/landing/assets/vendor/glightbox/js/glightbox.min.js') }}"></script>
    <script src="{{ asset('font_end/landing/assets/vendor/swiper/swiper-bundle.min.js') }}"></script>
    <script src="{{ asset('font_end/landing/assets/vendor/isotope-layout/isotope.pkgd.min.js') }}"></script>

    <!-- Main JS File -->
    <script src="{{ asset('font_end/landing/assets/js/main.js') }}"></script>

</body>

</html>
