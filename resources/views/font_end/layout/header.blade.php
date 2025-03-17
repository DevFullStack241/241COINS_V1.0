<!-- header -->
<header class="main-header">
    <!--  logo  -->
    <div class="logo-holder"><a href="{{ route('home') }}"><img src="{{ asset('font_end/assets/images/logo.png') }}"
                alt="">
        </a></div>
    <!-- logo end  -->
    <!-- nav-button-wrap-->
    <div class="nav-button-wrap color-bg nvminit">
        <div class="nav-button">
            <span></span><span></span><span></span>
        </div>
    </div>
    <!-- nav-button-wrap end-->
    <!--  login btn -->
    @livewire('admin-owner-client-header-profile-info')
    <!--  login btn  end -->
    <!--  navigation -->
    <div class="nav-holder main-menu">
        <nav>
            <ul class="no-list-style">
                <li>
                    <a href="{{ route('home') }}">Accueil</a>
                </li>
                <li>
                    <a href="{{ route('etablissement') }}">Etablissements</a>
                </li>
                <li>
                    <a href="{{ route('apropos') }}">À propos</a>
                </li>
                <li>
                    <a href="{{ route('contact') }}">Contact</a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- navigation  end -->

</header>
<!-- header end  -->
