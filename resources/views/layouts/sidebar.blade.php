<div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
    class="flex flex-col fixed z-30 inset-y-0 left-0 w-60 transition duration-300 transform bg-[#3E6553] overflow-y-auto lg:translate-x-0 lg:static lg:inset-0 items-center py-6">
    <div class="sidebar__profiel">
        <a href="{{ route('admin.dashboard') }}">
            <span class="text-white text-2xl mx-2 font-semibold">Dashboard</span>
        </a>
        <a href="#" class="sidebar__close text-white">
            <i class="bi bi-x-lg"></i>
        </a>
    </div>
    <ul class="flex flex-col mt-0 px-0 pt-7">
        <a class="flex items-center mt-4 py-2 pr-6 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ Route::currentRouteNamed('admin.dashboard') ? 'active' : '' }} "
            href="{{ route('admin.dashboard') }}">
            <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                stroke="currentColor">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M11 3.055A9.001 9.001 0 1020.945 13H11V3.055z"></path>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                    d="M20.488 9H15V3.512A9.025 9.025 0 0120.488 9z"></path>
            </svg>

            <span class="mx-3">Dashboard</span>
        </a>
        <li class="pt-6">
            <p>LAYOUTS & PAGES</p>
        </li>
        @canany(['Role access', 'Role add', 'Role edit', 'Role delete'])
            <a class="flex items-center mt-4 py-2 pr-6 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ Route::currentRouteNamed('admin.roles.index') ? 'active' : '' }}"
                href="{{ route('admin.roles.index') }}">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z">
                    </path>
                </svg>
            <a class="flex items-center mt-4 py-2 px-6 text-gray-500 hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ Route::currentRouteNamed('admin.roles.index') ? 'active' : '' }}"
                href="{{ route('admin.roles.index') }}">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z">
                    </path>
                </svg>

                <span class="mx-3">Role</span>
            </a>
        @endcanany
        @canany(['User access', 'User add', 'User edit', 'User delete'])
            <a class="flex items-center mt-4 py-2 pr-6 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ Route::currentRouteNamed('admin.users.index') ? 'active' : '' }}"
                href="{{ route('admin.users.index') }}">
                <span class="inline-flex justify-center items-center">
                    <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24"
                        xmlns="http://www.w3.org/2000/svg">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                            d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path>
                    </svg>
                </span>

                <span class="mx-3">Medewerkers</span>
            </a>
        @endcanany
        @canany(['Permission access', 'Permission add', 'Permission edit', 'Permission delete'])
            <a class="flex items-center mt-4 py-2 pr-6 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ Route::currentRouteNamed('admin.permissions.index') ? 'active' : '' }}"
                href="{{ route('admin.permissions.index') }}">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z">
                    </path>
                </svg>

                <span class="mx-3">Permission</span>
            </a>
        @endcanany
        <li class="pt-6">
            <a herf="#" class="nav-link">
                <i class="bi bi-window-sidebar nav-icon me-2"></i>
                <p>PRODUCTEN</p>
            </a>
        </li>
        @canany(['Permission access', 'Permission add', 'Permission edit', 'Permission delete'])
            <a class="flex items-center mt-4 py-2 pr-6 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ Route::currentRouteNamed('admin.permissions.index') ? 'active' : '' }}"
                href="{{ route('admin.permissions.index') }}">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24"
                    stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M17 14v6m-3-3h6M6 10h2a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2zm10 0h2a2 2 0 002-2V6a2 2 0 00-2-2h-2a2 2 0 00-2 2v2a2 2 0 002 2zM6 20h2a2 2 0 002-2v-2a2 2 0 00-2-2H6a2 2 0 00-2 2v2a2 2 0 002 2z">
                    </path>
                </svg>

                <span class="mx-3">Producten</span>
            </a>
        @endcanany
    </ul>
</div>
