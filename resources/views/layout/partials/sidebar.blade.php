<div id="sidebar">
    <div class="sidebar-wrapper active">
        @include('components.sidebar-header')
        <div class="sidebar-menu">
            <ul class="menu">
                <li class="sidebar-title">Menu</li>

                <li class="sidebar-item {{ Request::routeIs('master-employee') ? 'active' : '' }}">
                    <a href="{{ route('master-employee') }}" class="sidebar-link">
                        <i class="bi bi-grid-fill"></i>
                        <span>Master Employee</span>
                    </a>
                </li>

                <li class="sidebar-item {{ Request::routeIs('cuti_employee.index') ? 'active' : '' }}">
                    <a href="{{ route('cuti_employee.index') }}" class="sidebar-link">
                        <i class="bi bi-stack"></i>
                        <span>Leave Employee</span>
                    </a>
                </li>

                <li class="sidebar-title">Account</li>
                <li class="sidebar-item">
                    @include('components.partials.btn-logout')
                </li>
            </ul>
        </div>
    </div>
</div>
