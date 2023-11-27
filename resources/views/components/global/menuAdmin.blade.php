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
    @if (Gate::allows('UserManagement'))
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
@endcanany
{{--

    <li class="menu-header small text-uppercase ">
        <span class="menu-header-text">Users</span>
    </li> --}}


@canany(['GajiManagement', 'AprovalGajiSpv', 'AprovalGajiAsmen', 'AprovalGajiGm', 'AprovalGajiDirut'])
    <li class="menu-header small text-uppercase ">
        <span class="menu-header-text">Employe</span>
    </li>
    <li class="menu-item  {{ Request::is('employe*') ? 'active open' : '' }} ">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-group"></i>
            <div data-i18n="Account Settings">Employe</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item {{ Request::is('employe*') ? (Request::is('employe/detail*') ? '' : 'active') : '' }}">
                <a href="{{ route('page_employe') }}" class="menu-link">
                    <div data-i18n="Without menu">Data Employe</div>
                </a>
            </li>
        </ul>
    </li>
    @canany(['GajiManagement', 'AprovalGajiSpv', 'AprovalGajiAsmen', 'AprovalGajiGm', 'AprovalGajiDirut'])
        <li class="menu-item  {{ Request::is('gaji*') ? 'active open' : '' }} ">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-dollar-circle"></i>
                <div data-i18n="Account Settings">Gaji</div>
            </a>
            @can('GajiManagement')
                <ul class="menu-sub">
                    <li class="menu-item {{ Request::is('gaji/gaji-param') ? 'active' : '' }}">
                        <a href="{{ route('page_gaji.param') }}" class="menu-link">
                            <div data-i18n="Without menu">Gaji Param</div>
                        </a>
                    </li>
                </ul>
            @endcan
            <ul class="menu-sub">
                <li class="menu-item {{ Request::is('gaji*') ? (Request::is('gaji/gaji-param') ? '' : 'active') : '' }}">
                    <a href="{{ route('page_gaji') }}" class="menu-link">
                        <div data-i18n="Without menu">Data Gaji</div>
                    </a>
                </li>
            </ul>
        </li>
    @endcanany

@endcanany
@canany(['AprovalGajiSU', 'AprovalGajiSpv', 'AprovalGajiAsmen', 'AprovalGajiGm', 'AprovalGajiDirut'])
    <li class="menu-header small text-uppercase ">
        <span class="menu-header-text">Task</span>
    </li>
    <li class="menu-item  {{ Request::is('task') ? 'active open' : '' }} ">
        <a href="javascript:void(0);" class="menu-link menu-toggle">
            <i class="menu-icon tf-icons bx bx-task"></i>
            <div data-i18n="Account Settings">Task</div>
        </a>
        <ul class="menu-sub">
            <li class="menu-item {{ Request::is('task') ? 'active' : '' }}">
                <a href="{{ route('page_task') }}" class="menu-link">
                    <div data-i18n="Without menu">Pengajuan</div>
                </a>
            </li>
        </ul>
    </li>
@endcanany
