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
                <h4>Welcome, <span>{{ $owner->name }}</span></h4>
            </div>
            <a href="{{ route('owner.logout') }}"
                onclick="event.preventDefault();document.getElementById('ownerLogoutForm').submit();"
                class="log-out-btn   tolt" data-microtip-position="bottom" data-tooltip="Décoonexion"><i
                    class="far fa-power-off"></i></a>
            <form action="{{ route('owner.logout') }}" id="ownerLogoutForm" method="POST">@csrf</form>
        </div>
    @endif


</div>
