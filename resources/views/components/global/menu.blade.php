<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="/" class="app-brand-link">
            <span class="app-brand-logo demo">
                <img src="/img/logo/LOGO-PAGE-2-W.png" alt="">
            </span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto d-block d-xl-none">
            <i class="bx bx-chevron-left bx-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow py-1 ps ps--active-y"></div>

    {{-- @can('admin') --}}
    {{-- Admin --}}
    {{-- @include('dashboard.components.menuAdmin') --}}
    {{-- @else --}}
    {{-- User --}}
    {{-- @include('dashboard.components.menuUser') --}}
    {{-- @endcan --}}
    @include('components.global.menuAdmin')


</aside>
