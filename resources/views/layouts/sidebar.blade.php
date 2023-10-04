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



        <li class="menu-item">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-package"></i>
                <div data-i18n="POS">{{ __('POS') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item">
                    <a href="#" class="menu-link">Add New</a>
                </li>
            </ul>
        </li>
        
        
        
        {{-- Product Management --}}
        <li class="menu-item {{ activeRoute(['stores.index','categories.index','products.index',]) ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-package"></i>
                <div data-i18n="Product Management">{{ __('Product Management') }}</div>
            </a>
            <ul class="menu-sub">

                <li class="menu-item {{ activeRoute(['stores.index']) ? 'active' : '' }}">
                    <a href="{{ route('stores.index') }}" class="menu-link">
                        <div data-i18n="Store">{{ __('Store') }}</div>
                    </a>
                </li>

                <li class="menu-item {{ activeRoute(['categories.index']) ? 'active' : '' }}">
                    <a href="{{ route('categories.index') }}" class="menu-link">
                        <div data-i18n="Categories">{{ __('Category') }}</div>
                    </a>
                </li>

                <li class="menu-item {{ activeRoute(['products.index']) ? 'active' : '' }}">
                    <a href="{{ route('products.index') }}" class="menu-link">
                        <div data-i18n="Categories">{{ __('Product') }}</div>
                    </a>
                </li>
               

            </ul>
        </li>


         {{-- Stock Transfer --}}
         <li class="menu-item {{ activeRoute(['transfers.index','transfers.create']) ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-smart-home"></i>
                <div data-i18n="Product Management">{{ __('Stock Transfer') }}</div>
            </a>
            <ul class="menu-sub">

                <li class="menu-item {{ activeRoute(['transfers.index']) ? 'active' : '' }}">
                    <a href="{{ route('transfers.index') }}" class="menu-link">
                        <div data-i18n="All Transfer">{{ __('All Transfer') }}</div>
                    </a>
                </li>

                <li class="menu-item {{ activeRoute(['transfers.create']) ? 'active' : '' }}">
                    <a href="{{ route('transfers.create') }}" class="menu-link">
                        <div data-i18n="Transfer">{{ __('New Transfer') }}</div>
                    </a>
                </li>
               

            </ul>
        </li>



         {{-- Report --}}
         <li class="menu-item {{ activeRoute(['reports.stock','reports.stock.pdf']) ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-books"></i>
                <div data-i18n="Report">{{ __('Report') }}</div>
            </a>
            <ul class="menu-sub">

                <li class="menu-item {{ activeRoute(['reports.stock']) ? 'active' : '' }}">
                    <a href="{{ route('reports.stock') }}" class="menu-link">
                        <div data-i18n="All Transfer">{{ __('Stock') }}</div>
                    </a>
                </li>

                {{-- <li class="menu-item {{ activeRoute(['transfers.create']) ? 'active' : '' }}">
                    <a href="{{ route('transfers.create') }}" class="menu-link">
                        <div data-i18n="Transfer">{{ __('New Transfer') }}</div>
                    </a>
                </li> --}}
               

            </ul>
        </li>




       


       

        {{-- User Management --}}
        <li class="menu-item {{ activeRoute(['permission_ui.users.index','permission_ui.permissions.create','permission_ui.roles.index','permission_ui.permissions.index','permission_ui.permissions.create']) ? 'open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons ti ti-users"></i>
                <div data-i18n="Setting">{{ __('User Management') }}</div>
            </a>
            <ul class="menu-sub">

                <li class="menu-item {{ activeRoute(['permission_ui.users.index']) ? 'active' : '' }}">
                    <a href="{{ route('permission_ui.users.index') }}" class="menu-link">
                        <div data-i18n="All User">{{ __('Users') }}</div>
                    </a>
                </li>

                <li class="menu-item {{ activeRoute(['permission_ui.permissions.index']) ? 'active' : '' }}">
                    <a href="{{ route('permission_ui.permissions.index') }}" class="menu-link">
                        <div data-i18n="Permission">{{ __('Permission') }}</div>
                    </a>
                </li>

                <li class="menu-item {{ activeRoute(['permission_ui.roles.index']) ? 'active' : '' }}">
                    <a href="{{ route('permission_ui.roles.index') }}" class="menu-link">
                        <div data-i18n="Role">{{ __('Role') }}</div>
                    </a>
                </li>
               

            </ul>
        </li>

    </ul>
</aside>
