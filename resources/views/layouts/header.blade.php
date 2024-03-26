<header class="smooth-shadow flex justify-between items-center py-4 px-6 bg-white ">
    <div class="flex align-items-center justify-center gap-4">
        <a class="lg:hidden md:block" id="hamburgermenu" @click="sidebarOpen = true">
            <svg width="18px" height="18px" viewBox="-0.5 0 25 25" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M2 12.32H22" stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M2 18.32H22" stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
                <path d="M2 6.32001H22" stroke="#000000" stroke-width="1.5" stroke-linecap="round"
                    stroke-linejoin="round" />
            </svg>
        </a>
    </div>
    <ul class="ms-2 d-flex navbar__nav">
        <li class="ms-2">
            <div class="flex items-center">
                <div x-data="{ dropdownOpen: false }" class="relative">
                    <button type="button" @click="dropdownOpen = ! dropdownOpen"
                        class="relative block h-8 w-8 rounded-full overflow-hidden shadow focus:outline-none">
                        <img class="h-full w-full object-cover"
                            src="{{ asset('images/' . (auth()->user()->profile ?? 'user.avif')) }}" alt="Your avatar">
                    </button>

                    <div x-show="dropdownOpen" @click="dropdownOpen = false" class="fixed inset-0 h-full w-full z-10"
                        style="display: none;"></div>

                    <div x-show="dropdownOpen"
                        class="absolute right-0 mt-2 w-48 bg-white rounded-md overflow-hidden shadow-xl z-10"
                        style="display: none;">
                        <a href="{{ route('admin.profile.index') }}"
                            class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#3E6553] hover:text-white">Profile</a>

                        <form method="POST" action="{{ route('admin.logout') }}">
                            @csrf
                            <a href="{{ route('admin.logout') }}"
                                onclick="event.preventDefault();
                                                this.closest('form').submit();"
                                class="block px-4 py-2 text-sm text-gray-700 hover:bg-[#3E6553] hover:text-white">Logout</a>
                        </form>
                    </div>
                </div>
            </div>
        </li>
    </ul>
</header>
