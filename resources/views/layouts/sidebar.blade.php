<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ route('dashboard') }}" class="app-brand-link">
            <span class="app-brand-logo demo"></span>
            <span class="app-brand-text demo menu-text fw-bold">Khokon</span>
        </a>

        <a href="javascript:void(0);" class="layout-menu-toggle menu-link text-large ms-auto">
            <i class="ti menu-toggle-icon d-none d-xl-block ti-sm align-middle"></i>
            <i class="ti ti-x d-block d-xl-none ti-sm align-middle"></i>
        </a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1">
        <!-- Page -->
        <li class="menu-item {{ request()->routeIs('dashboard') ? 'active' : '' }}">
            <a href="{{ route('dashboard') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Page 1">{{ __('Dashboard') }}</div>
            </a>
        </li>
       


        <li class="menu-item {{ request()->routeIs('transactions.index') ? 'active' : '' }}">
            <a href="{{ route('transactions.index') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Page 2">{{ __('All Transaction') }}</div>
            </a>
        </li>

        <li class="menu-item {{ request()->routeIs('transactions.deposit') ? 'active' : '' }}">
            <a href="{{ route('transactions.deposit') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Page 2">{{ __('Deposit') }}</div>
            </a>
        </li>


        <li class="menu-item {{ request()->routeIs('transactions.withdrawal') ? 'active' : '' }}">
            <a href="{{ route('transactions.withdrawal') }}" class="menu-link">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Page 2">{{ __('Withdrawal') }}</div>
            </a>
        </li>

        {{-- User Management --}}
        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div data-i18n="Setting">{{ __('User Management') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="{{ route('permission_ui.users.index') }}" class="menu-link">
                        <div data-i18n="All User">{{ __('Users') }}</div>
                    </a>
                </li>
               

            </ul>
        </li>

    </ul>
</aside>
