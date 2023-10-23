@canany(['RoleManagement', 'SatkerManagement'])
    <li class="menu-header small text-uppercase ">
        <span class="menu-header-text">Admin</span>
    </li>
    <li class="menu-item  {{ Request::is('admin*') ? 'active open' : '' }} ">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-cog"></i>
            <div data-i18n="Account Settings">Admin Param</div>
        </a>
        <ul class="menu-sub">
            @can('RoleManagement.create')
                <li class="menu-item {{ Request::is('admin/role-permission*') ? 'active' : '' }}">
                    <a href="{{ route('role.permission') }}" class="menu-link">
                        <div data-i18n="Without menu">Role & Permission</div>
                    </a>
                </li>
            @endcan
            @can('SatkerManagement')
                <li class="menu-item {{ Request::is('admin/employe_param*') ? 'active' : '' }}">
                    <a href="{{ route('page_employe_param') }}" class="menu-link">
                        <div data-i18n="Without menu">Employe Param</div>
                    </a>
                </li>
            @endcan
        </ul>
    </li>
@endcanany

@can('UserManagement')
    <li class="menu-header small text-uppercase ">
        <span class="menu-header-text">Users</span>
    </li>
    <li class="menu-item  {{ Request::is('users*') ? 'active open' : '' }} ">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-user-pin"></i>
            <div data-i18n="Account Settings">Users</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item {{ Request::is('users*') ? 'active' : '' }}">
                <a href="{{ route('page_user') }}" class="menu-link">
                    <div data-i18n="Without menu">Data Users</div>
                </a>
            </li>
        </ul>
    </li>
@endcan


{{-- <li class="menu-header small text-uppercase ">
    <span class="menu-header-text">Kepegawaian</span>
</li>
<li class="menu-item  {{ Request::is('Users*') ? 'active open' : '' }} ">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-user-pin"></i>
        <div data-i18n="Account Settings">Users</div>
    </a>
    <ul class="menu-sub">
        <li class="menu-item {{ Request::is('Users*') ? 'active' : '' }}">
            <a href="/Users" class="menu-link">
                <div data-i18n="Without menu">Data Users</div>
            </a>
        </li>
    </ul>
</li> --}}

<li class="menu-header small text-uppercase ">
    <span class="menu-header-text">Gaji</span>
</li>
<li class="menu-item  {{ Request::is('gaji*') ? 'active open' : '' }} ">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-dollar-circle"></i>
        <div data-i18n="Account Settings">Gaji</div>
    </a>
    <ul class="menu-sub">
        <li class="menu-item {{ Request::is('gaji/gaji-param') ? 'active' : '' }}">
            <a href="{{ route('page_gaji.param') }}" class="menu-link">
                <div data-i18n="Without menu">Gaji Param</div>
            </a>
        </li>
    </ul>
    <ul class="menu-sub">
        <li class="menu-item {{ Request::is('gaji') ? 'active' : '' }}">
            <a href="{{ route('page_gaji') }}" class="menu-link">
                <div data-i18n="Without menu">Data Gaji</div>
            </a>
        </li>
    </ul>
    <ul class="menu-sub">
        <li class="menu-item {{ Request::is('/gaji-param') ? 'active' : '' }}">
            <a href="{{ route('page_gaji') }}" class="menu-link">
                <div data-i18n="Without menu">Gaji Employee</div>
            </a>
        </li>
    </ul>
</li>
