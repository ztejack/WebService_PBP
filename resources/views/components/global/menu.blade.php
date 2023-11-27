<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="/img/logo/LOGO-PAGE-2-W.png" alt="">
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow py-1 ps ps--active-y"></div>
    <ul class="menu-inner py-1">
        <!-- Dashboard -->
        <li class="menu-item {{ Request::is('home') || Request::is('/') ? 'active' : '' }}">
            <a href="/home" class="menu-link">
                <i class="menu-icon tf-icons bx bx-home-circle"></i>
                <div data-i18n="Analytics">Dashboard</div>
            </a>
        </li>
        <li class="menu-item {{ Request::is('auth/profile') ? 'active open' : '' }} ">
            <a href="javascript:void(0);" class="menu-link menu-toggle ">
                <i class="menu-icon tf-icons bx bx-user"></i>
                <div data-i18n="Account Settings">Account Settings</div>
            </a>
            <ul class="menu-sub ">
                <li class="menu-item {{ Request::is('auth/profile*') ? 'active' : '' }}">
                    <a href="{{ route('profile_user') }}" class="menu-link ">
                        <div data-i18n="Account">Profile</div>
                    </a>
                </li>
            </ul>
        </li>


        {{-- @can('admin') --}}
        {{-- Admin --}}
        {{-- @include('dashboard.components.menuAdmin') --}}
        {{-- @else --}}
        {{-- User --}}
        {{-- @canany(['RoleManagement', 'SatkerManagement', 'ContractManagement'])
            @include('components.global.menuAdminParam')
            @can()
            @endcan
        @endcanany --}}
        {{-- @endcan --}}
        @include('components.global.menuAdmin')

    </ul>
</aside>
