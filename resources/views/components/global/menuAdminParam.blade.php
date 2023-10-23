<li class="menu-header small text-uppercase ">
    <span class="menu-header-text">Admin</span>
</li>
<li class="menu-item  {{ Request::is('admin*') ? 'active open' : '' }} ">
    <a href="javascript:void(0);" class="menu-link menu-toggle">
        <i class="menu-icon tf-icons bx bx-cog"></i>
        <div data-i18n="Account Settings">Admin Param</div>
    </a>
    <ul class="menu-sub">
        @can('RoleManagement')
            <li class="menu-item {{ Request::is('admin/role-permission*') ? 'active' : '' }}">
                <a href="{{ route('role.permission') }}" class="menu-link">
                    <div data-i18n="Without menu">Role & Permission</div>
                </a>
            </li>
        @endcan
        @can('SatkerManagement')
            <li class="menu-item {{ Request::is('satker*') ? 'active' : '' }}">
                <a href="#" class="menu-link">
                    <div data-i18n="Without menu">Satuan Kerja</div>
                </a>
            </li>
        @endcan
        @can('ContractManagement')
            <li class="menu-item {{ Request::is('contract*') ? 'active' : '' }}">
                <a href="#" class="menu-link">
                    <div data-i18n="Without menu">Conract</div>
                </a>
            </li>
        @endcan
        @can('GolonganManagement')
            <li class="menu-item {{ Request::is('golongan*') ? 'active' : '' }}">
                <a href="#" class="menu-link">
                    <div data-i18n="Without menu">Golongan</div>
                </a>
            </li>
        @endcan
    </ul>
</li>
