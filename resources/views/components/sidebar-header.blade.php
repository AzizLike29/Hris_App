<div class="sidebar-header position-relative">
    <div class="d-flex justify-content-between align-items-center">
        <div class="logo">
            <a href="master-employee">
                <img src="{{ asset('assets/compiled/svg/logo.svg') }}" alt="Logo" />
            </a>
        </div>
        @include('components.theme-toogle-sidebar')
        <div class="sidebar-toggler x">
            <a href="{{ route('master-employee') }}" class="sidebar-hide d-xl-none d-block"><i
                    class="bi bi-x bi-middle"></i></a>
        </div>
    </div>
</div>
