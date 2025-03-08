<div>

    @if (Auth::guard('admin')->check())
        <div class="user-info-dropdown">
            <div class="dropdown">
                <a class="dropdown-toggle" href="#" role="button" data-toggle="dropdown">
                    <span class="user-icon">
                        <img src="{{ $admin->picture }}" alt="" />
                    </span>
                    <span class="user-name">{{ $admin->name }}</span>
                </a>
                <div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
                    <a class="dropdown-item" href="{{ route('admin.profile') }}"><i class="dw dw-user1"></i> Profile</a>
                    <a class="dropdown-item" href="{{ route('admin.logout_handler') }}"
                        onclick="event.preventDefault();document.getElementById('adminLogoutForm').submit();"><i
                            class="dw dw-logout"></i> Déconnexion</a>
                    <form action="{{ route('admin.logout_handler') }}" id="adminLogoutForm" method="POST">@csrf</form>
                </div>
            </div>
        </div>
    @elseif (Auth::guard('owner')->check())
        <div class="dashbard-menu-header">
            <div class="dashbard-menu-avatar fl-wrap">
                <img src="{{ $owner->picture }}" alt="">
                <h4>Salut, <span>{{ $owner->name }}</span></h4>
            </div>
            <a href="{{ route('owner.logout') }}"
                onclick="event.preventDefault();document.getElementById('ownerLogoutForm').submit();"
                class="log-out-btn   tolt" data-microtip-position="bottom" data-tooltip="Décoonexion"><i
                    class="far fa-power-off"></i></a>
            <form action="{{ route('owner.logout') }}" id="ownerLogoutForm" method="POST">@csrf</form>
        </div>
    @elseif(Auth::guard('client')->check())
        <!-- Affichage du menu pour le client -->
        <div class="cart-btn" data-microtip-position="" data-tooltip="">
            <i class="fal fa-user"></i>
        </div>
        <div class="show-reg-form dasbdord-submenu-open">
            <img src="{{ $client->picture }}" alt="">
        </div>
        <div class="dashboard-submenu">
            <div class="dashboard-submenu-title fl-wrap">Salut , <span>{{ $client->name }}</span></div>
            <ul>
                <li><a href="{{ route('home') }} "><i class="fal fa-chart-line"></i>Dashboard</a></li>
                <li><a href="{{ route('client.profile') }} "><i class="fal fa-user-edit"></i>Profil</a></li>
            </ul>
            <a href="{{ route('client.logout') }}"
                onclick="event.preventDefault(); document.getElementById('clientLogoutForm').submit();"
                class="color-bg db_log-out">
                <i class="far fa-power-off"></i> Déconnexion
            </a>
            <form action="{{ route('client.logout') }}" id="clientLogoutForm" method="POST">@csrf</form>
        </div>
    @else
        <!-- Affichage si l'utilisateur n'est pas connecté -->
        <div class="add-list_wrap">
            <a href="{{ route('landing') }}" class="add-list color-bg">
                <i class="fal fa-user"></i> <span>Se connecter</span>
            </a>
        </div>
    @endif

</div>
