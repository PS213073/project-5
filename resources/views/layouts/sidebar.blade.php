<div :class="sidebarOpen ? 'translate-x-0 ease-out' : '-translate-x-full ease-in'"
    class="flex flex-col fixed z-30 inset-y-0 left-0 w-60 transition duration-300 transform bg-[#3E6553] overflow-y-auto lg:translate-x-0 lg:static lg:inset-0 items-center py-6 scrollbar-thin scrollbar-thumb-sky-700">
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
        @canany(['User access', 'User create', 'User edit', 'User delete'])
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
        @canany(['Role access', 'Role create', 'Role edit', 'Role delete'])
            <a class="flex items-center mt-4 py-2 pr-6 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ Route::currentRouteNamed('admin.roles.index') ? 'active' : '' }}"
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
        @canany(['Permission access', 'Permission create', 'Permission edit', 'Permission delete'])
            <a class="flex items-center mt-4 py-2 pr-6 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ Route::currentRouteNamed('admin.permissions.index') ? 'active' : '' }}"
                href="{{ route('admin.permissions.index') }}">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path fill="none" d="M0 0h24v24H0z"></path>
                    <path
                        d="M10.7577 11.8281L18.6066 3.97919L20.0208 5.3934L18.6066 6.80761L21.0815 9.28249L19.6673 10.6967L17.1924 8.22183L15.7782 9.63604L17.8995 11.7574L16.4853 13.1716L14.364 11.0503L12.1719 13.2423C13.4581 15.1837 13.246 17.8251 11.5355 19.5355C9.58291 21.4882 6.41709 21.4882 4.46447 19.5355C2.51184 17.5829 2.51184 14.4171 4.46447 12.4645C6.17493 10.754 8.81633 10.5419 10.7577 11.8281ZM10.1213 18.1213C11.2929 16.9497 11.2929 15.0503 10.1213 13.8787C8.94975 12.7071 7.05025 12.7071 5.87868 13.8787C4.70711 15.0503 4.70711 16.9497 5.87868 18.1213C7.05025 19.2929 8.94975 19.2929 10.1213 18.1213Z">
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
        @canany(['Product access', 'Product create', 'Product edit', 'Product delete'])
            <a class="flex items-center mt-4 py-2 pr-6 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ Route::currentRouteNamed('admin.permissions.index') ? 'active' : '' }}"
                href="{{ route('admin.products.index') }}">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path fill="none" d="M0 0h24v24H0z"></path>
                    <path
                        d="M5.99805 2C8.68733 2 11.0224 3.51653 12.1947 5.74104C13.372 4.08252 15.3086 3 17.498 3H20.998V5.5C20.998 9.08985 18.0879 12 14.498 12H12.998V13H17.998V20C17.998 21.1046 17.1026 22 15.998 22H7.99805C6.89348 22 5.99805 21.1046 5.99805 20V13H10.998V11H8.99805C5.13205 11 1.99805 7.86599 1.99805 4V2H5.99805ZM15.998 15H7.99805V20H15.998V15ZM18.998 5H17.498C15.0128 5 12.998 7.01472 12.998 9.5V10H14.498C16.9833 10 18.998 7.98528 18.998 5.5V5ZM5.99805 4H3.99805C3.99805 6.76142 6.23662 9 8.99805 9H10.998C10.998 6.23858 8.75947 4 5.99805 4Z">
                    </path>
                </svg>

                <span class="mx-3">Producten</span>
            </a>
        @endcanany
        @canany(['Category access', 'Category create', 'Category edit', 'Category delete'])
            <a class="flex items-center mt-4 py-2 pr-6 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ Route::currentRouteNamed('admin.roles.index') ? 'active' : '' }}"
                href="{{ route('admin.categories.index') }}">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path fill="none" d="M0 0h24v24H0z"></path>
                    <path
                        d="M11.9999 2.07611L12.4551 2.30879C14.2208 3.21143 15.7328 4.53809 16.8573 6.15473C17.7852 5.71402 18.7788 5.38872 19.8193 5.19758L21 4.98071V12.9998C21 17.9703 16.9706 22 12 22C7.02944 22 3 17.9705 3 13V4.98071L4.18066 5.19758C5.22115 5.38871 6.2147 5.71398 7.14253 6.15465C8.26706 4.53805 9.77902 3.21141 11.5447 2.30879L11.9999 2.07611ZM8.87757 7.16504C10.1073 8.02646 11.1679 9.11266 12 10.3644C12.8322 9.11272 13.893 8.02642 15.1223 7.16515C14.2952 6.01594 13.2302 5.04923 11.9999 4.33741C10.7697 5.0492 9.70468 6.01587 8.87757 7.16504ZM10.8993 12.4338C10.0182 10.7202 8.65593 9.2932 6.99112 8.33225C6.3667 7.97183 5.6999 7.67707 5 7.45728V13C5 16.2899 7.26961 19.0497 10.3285 19.7992C10.1137 18.9004 10 17.9629 10 16.9998C10 15.383 10.3198 13.8411 10.8993 12.4338ZM12.4531 19.9855C16.1079 19.752 19 16.7136 19 12.9998V7.45728C18.3 7.67709 17.6332 7.97187 17.0088 8.33233C14.0127 10.0617 12 13.2963 12 16.9998C12 18.041 12.1588 19.0436 12.4531 19.9855Z">
                    </path>
                </svg>
                <span class="mx-3">Typen</span>
            </a>
        @endcanany
        <li class="pt-6">
            <a herf="#" class="nav-link">
                <i class="bi bi-window-sidebar nav-icon me-2"></i>
                <p>Kuin</p>
            </a>
        </li>
        @canany(['ApiProduct access'])
            <a class="flex items-center mt-4 py-2 pr-6 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ Route::currentRouteNamed('admin.roles.index') ? 'active' : '' }}"
                href="{{ route('admin.kuin.products') }}">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path fill="none" d="M0 0h24v24H0z"></path>
                    <path
                        d="M4.00488 16V4H2.00488V2H5.00488C5.55717 2 6.00488 2.44772 6.00488 3V15H18.4433L20.4433 7H8.00488V5H21.7241C22.2764 5 22.7241 5.44772 22.7241 6C22.7241 6.08176 22.7141 6.16322 22.6942 6.24254L20.1942 16.2425C20.083 16.6877 19.683 17 19.2241 17H5.00488C4.4526 17 4.00488 16.5523 4.00488 16ZM6.00488 23C4.90031 23 4.00488 22.1046 4.00488 21C4.00488 19.8954 4.90031 19 6.00488 19C7.10945 19 8.00488 19.8954 8.00488 21C8.00488 22.1046 7.10945 23 6.00488 23ZM18.0049 23C16.9003 23 16.0049 22.1046 16.0049 21C16.0049 19.8954 16.9003 19 18.0049 19C19.1095 19 20.0049 19.8954 20.0049 21C20.0049 22.1046 19.1095 23 18.0049 23Z">
                    </path>
                </svg>
                <span class="mx-3">Bestellen</span>
            </a>
        @endcanany
        @canany(['ApiOrder access'])
            <a class="flex items-center mt-4 py-2 pr-6 text-white hover:bg-gray-700 hover:bg-opacity-25 hover:text-gray-100 {{ Route::currentRouteNamed('admin.roles.index') ? 'active' : '' }}"
                href="{{ route('admin.kuin.orders') }}">
                <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="currentColor">
                    <path fill="none" d="M0 0h24v24H0z"></path>
                    <path
                        d="M12 22C6.47715 22 2 17.5228 2 12C2 6.47715 6.47715 2 12 2C17.5228 2 22 6.47715 22 12C22 17.5228 17.5228 22 12 22ZM12 20C16.4183 20 20 16.4183 20 12C20 7.58172 16.4183 4 12 4C7.58172 4 4 7.58172 4 12C4 16.4183 7.58172 20 12 20ZM11.0026 16L6.75999 11.7574L8.17421 10.3431L11.0026 13.1716L16.6595 7.51472L18.0737 8.92893L11.0026 16Z">
                    </path>
                </svg>
                <span class="mx-3">Orders</span>
            </a>
        @endcanany
    </ul>
</div>
