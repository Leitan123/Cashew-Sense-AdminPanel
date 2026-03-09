<nav x-data="{ open: false }" class="fixed top-0 left-0 h-full w-64 bg-[#4f7942] border-r border-[#3b5b31] z-30 hidden md:flex flex-col">
    <!-- Logo -->
    <div class="flex items-center justify-center h-16 border-b border-[#3b5b31]">
        <a href="{{ route('dashboard') }}" class="flex items-center space-x-2">
            <x-application-logo class="block h-9 w-auto fill-current text-white" />
            <span class="text-white font-semibold text-lg">CashewSense</span>
        </a>
    </div>

    <!-- Sidebar Navigation Links -->
    <div class="flex-1 overflow-y-auto py-4">
        <div class="space-y-1 px-3">
            <x-sidebar-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-4 0a1 1 0 01-1-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 01-1 1h-2z"></path></svg>
                {{ __('Dashboard') }}
            </x-sidebar-link>

            <x-sidebar-link :href="route('customers.index')" :active="request()->routeIs('customers.index')">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                {{ __('Customers') }}
            </x-sidebar-link>

            <x-sidebar-link :href="route('leafs.index')" :active="request()->routeIs('leafs.index')">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                {{ __('Leaf Scans') }}
            </x-sidebar-link>

            <x-sidebar-link :href="route('pests.index')" :active="request()->routeIs('pests.index')">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                {{ __('Pest Scans') }}
            </x-sidebar-link>

            <x-sidebar-link :href="route('soils.index')" :active="request()->routeIs('soils.index')">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                {{ __('Soil Scans') }}
            </x-sidebar-link>

            <x-sidebar-link :href="route('farm-owners.index')" :active="request()->routeIs('farm-owners.index')">
                <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"></path></svg>
                {{ __('Farm Owners') }}
            </x-sidebar-link>
        </div>
    </div>

    <!-- User Section at Bottom -->
    <div class="border-t border-[#3b5b31] p-4">
        <x-dropdown align="bottom-start" width="48">
            <x-slot name="trigger">
                <button class="flex items-center w-full px-2 py-2 text-sm font-medium text-white rounded-md hover:bg-[#3b5b31] focus:outline-none transition ease-in-out duration-150">
                    <svg class="w-5 h-5 mr-3" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    <span class="truncate">{{ Auth::user()->name }}</span>
                    <svg class="fill-current h-4 w-4 ml-auto" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                        <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                    </svg>
                </button>
            </x-slot>

            <x-slot name="content">
                <x-dropdown-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-dropdown-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-dropdown-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-dropdown-link>
                </form>
            </x-slot>
        </x-dropdown>
    </div>
</nav>

<!-- Mobile Top Bar -->
<div class="md:hidden fixed top-0 left-0 right-0 z-30 bg-[#4f7942] border-b border-[#3b5b31]">
    <div class="flex items-center justify-between h-14 px-4">
        <a href="{{ route('dashboard') }}" class="flex items-center space-x-2">
            <x-application-logo class="block h-8 w-auto fill-current text-white" />
            <span class="text-white font-semibold">CashewSense</span>
        </a>
        <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-white hover:text-[#f5f5dc] hover:bg-[#3b5b31] focus:outline-none transition duration-150 ease-in-out">
            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
            </svg>
        </button>
    </div>

    <!-- Mobile Slide-out Menu -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden bg-[#4f7942] border-t border-[#3b5b31]">
        <div class="pt-2 pb-3 space-y-1 px-2">
            <x-responsive-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('customers.index')" :active="request()->routeIs('customers.index')">
                {{ __('Customers') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('leafs.index')" :active="request()->routeIs('leafs.index')">
                {{ __('Leaf Scans') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('pests.index')" :active="request()->routeIs('pests.index')">
                {{ __('Pest Scans') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('soils.index')" :active="request()->routeIs('soils.index')">
                {{ __('Soil Scans') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('farm-owners.index')" :active="request()->routeIs('farm-owners.index')">
                {{ __('Farm Owners') }}
            </x-responsive-nav-link>
        </div>

        <!-- Responsive Settings Options -->
        <div class="pt-4 pb-1 border-t border-[#3b5b31]">
            <div class="px-4">
                <div class="font-medium text-base text-white">{{ Auth::user()->name }}</div>
                <div class="font-medium text-sm text-gray-300">{{ Auth::user()->email }}</div>
            </div>

            <div class="mt-3 space-y-1">
                <x-responsive-nav-link :href="route('profile.edit')">
                    {{ __('Profile') }}
                </x-responsive-nav-link>

                <!-- Authentication -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <x-responsive-nav-link :href="route('logout')"
                            onclick="event.preventDefault();
                                        this.closest('form').submit();">
                        {{ __('Log Out') }}
                    </x-responsive-nav-link>
                </form>
            </div>
        </div>
    </div>
</div>
