<!-- Overlay when sidebar is open on small screens -->
<div :class="sidebarOpen ? 'block' : 'hidden'" @click="sidebarOpen = false"
     class="fixed inset-0 z-20 bg-black lg:hidden"></div>

<aside :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
       class="fixed inset-y-0 left-0 z-30 w-64 transition duration-300 transform lg:translate-x-0 lg:static lg:inset-0">
    <a href="{{ route('dashboard') }}" class="flex items-center justify-center py-4 border-b border-gray-700">
         <svg class="h-12 w-12" viewBox="0 0 512 512" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M364.61 390.213C304.625 450.196 207.37 450.196 147.386 390.213C117.394 360.22 102.398 320.911 102.398 281.6C102.398 242.291 117.394 202.981 147.386 172.989C147.386 230.4 153.6 281.6 230.4 307.2C230.4 256 256 102.4 294.4 76.7999C320 128 334.618 142.997 364.608 172.989C394.601 202.981 409.597 242.291 409.597 281.6C409.597 320.911 394.601 360.22 364.61 390.213Z" fill="#4C51BF" stroke="#4C51BF" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"/>
                <path d="M201.694 387.105C231.686 417.098 280.312 417.098 310.305 387.105C325.301 372.109 332.8 352.456 332.8 332.8C332.8 313.144 325.301 293.491 310.305 278.495C295.309 263.498 288 256 275.2 230.4C256 243.2 243.201 320 243.201 345.6C201.694 345.6 179.2 332.8 179.2 332.8C179.2 352.456 186.698 372.109 201.694 387.105Z" fill="white"/>
            </svg>
        <span class="text-white text-2xl font-semibold">{{ __('Dashboard') }}</span>
    </a>
    <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
            data-accordion="false">
            <!-- Dashboard Link -->
            <li class=" nav-item">
                <a href="{{ route('dashboard') }}"
                   class="nav-link {{ request()->routeIs('dashboard') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>{{ __('Dashboard') }}</p>
                </a>
            </li>

            <!-- Users Link -->
            <li class="nav-item">
                <a href="{{ route('users.index') }}"
                   class="nav-link {{ request()->routeIs('users.index') ? 'active' : '' }}">
                    <i class="nav-icon fas fa-users"></i>
                    <p>{{ __('Users') }}</p>
                </a>
            </li>
        </ul>
    </nav>

    <nav class="mt-2">
    <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
    
        <li class="nav-header">{{ __('User and Privilege') }}</li>


        {{-- <!-- Scholarship Offer Link -->
        <li class="nav-item">
            <a href="{{ route('account.scholarship-offer') }}"
               class="nav-link {{ request()->routeIs('account.scholarship-offer') ? 'active' : '' }}">
                <i class="nav-icon fas fa-graduation-cap"></i>
                <p>{{ __('Scholarship Offer') }}</p>
            </a>
        </li> --}}

        <!-- Job Recruiter Link -->
        <li class="nav-item">
            <a href="{{ route('accounts.index') }}"
               class="nav-link {{ request()->routeIs('accounts.index') ? 'active' : '' }}">
                <i class="nav-icon fas fa-briefcase"></i>
                <p>{{ __('Account') }}</p>
            </a>
        </li>

        <!-- Roles Link -->
        <li class="nav-item">
            <a href="{{ route('roles.index') }}"
               class="nav-link {{ request()->routeIs('roles.index') ? 'active' : '' }}">
                <i class="nav-icon fas fa-user-tag"></i>
                <p>{{ __('Roles') }}</p>
            </a>
        </li>

        <!-- Permissions Link -->
        <li class="nav-item">
            <a href="{{ route('permissions.index') }}"
               class="nav-link {{ request()->routeIs('permissions.index') ? 'active' : '' }}">
                <i class="nav-icon fas fa-lock"></i>
                <p>{{ __('Permissions') }}</p>
            </a>
        </li>

        <!-- Existing navigation items -->
    </ul>
</nav>

    <!-- /.sidebar-menu -->
</aside>
<!-- /.sidebar -->
