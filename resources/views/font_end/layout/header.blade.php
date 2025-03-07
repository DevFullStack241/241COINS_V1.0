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
    @if (Auth::guard('client')->check())
        <div class="add-list_wrap">
            <a href="{{ route('client.logout') }}"
                onclick="event.preventDefault();document.getElementById('clientLogoutForm').submit();"
                class="add-list color-bg"><i class="fal fa-user"></i> <span>Se
                    déconnecter</span></a>
            <form action="{{ route('client.logout') }}" id="clientLogoutForm" method="POST">@csrf</form>
        </div>
    @else
        <div class="add-list_wrap">
            <a href="{{ route('landing') }}" class="add-list color-bg"><i class="fal fa-user"></i> <span>Se
                    connecter</span></a>
        </div>
    @endif
    <!--  login btn  end -->
    <!--  navigation -->
    <div class="nav-holder main-menu">
        <nav>
            <ul class="no-list-style">
                <li>
                    <a href="">Accueil</a>
                </li>
                <li>
                    <a
                        href=">Établissements</a>
                </li>
                <li>
                    <a href="#">Catégories<i
                            class="fa fa-caret-down"></i></a>
                    <!--second level -->
                    <ul>
                        <li><a href="">Agences</a></li>
                        <li><a href="">Entreprises</a></li>
                        <li><a href="">Fast-Foods</a></li>
                        <li><a href="">Restaurants</a></li>
                    </ul>
                    <!--second level end-->
                </li>
                <li>
                    <a href="">À propos</a>
                </li>
                <li>
                    <a href="">Contact</a>
                </li>
            </ul>
        </nav>
    </div>
    <!-- navigation  end -->

</header>
<!-- header end  -->
