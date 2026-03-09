<!-- Sidebar (desktop) -->
<aside class="fixed top-0 left-0 h-full w-64 bg-[#4f7942] border-r border-[#3b5b31] z-30 hidden md:flex flex-col">
    <!-- Logo -->
    <div class="flex items-center justify-center h-16 border-b border-[#3b5b31]">
        <a href="{{ route('farm_owner.dashboard') }}" class="flex items-center space-x-2">
            <x-application-logo class="block h-9 w-auto fill-current text-white" />
            <span class="text-white font-semibold text-lg">CashewSense</span>
        </a>
    </div>

    <!-- Sidebar Navigation Links -->
    <div class="flex-1 overflow-y-auto py-4">
        <div class="space-y-1 px-3">
            <x-sidebar-link :href="route('farm_owner.dashboard')" :active="request()->routeIs('farm_owner.dashboard')">
                <svg class="w-5 h-5 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-4 0a1 1 0 01-1-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 01-1 1h-2z"></path></svg>
                {{ __('Dashboard') }}
            </x-sidebar-link>

            <x-sidebar-link :href="route('farm_owner.customers.index')" :active="request()->routeIs('farm_owner.customers.index')">
                <svg class="w-5 h-5 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path></svg>
                {{ __('Customers') }}
            </x-sidebar-link>

            <x-sidebar-link :href="route('farm_owner.leafs.index')" :active="request()->routeIs('farm_owner.leafs.index')">
                <svg class="w-5 h-5 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"></path></svg>
                {{ __('Leaf Scans') }}
            </x-sidebar-link>

            <x-sidebar-link :href="route('farm_owner.pests.index')" :active="request()->routeIs('farm_owner.pests.index')">
                <svg class="w-5 h-5 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path></svg>
                {{ __('Pest Scans') }}
            </x-sidebar-link>

            <x-sidebar-link :href="route('farm_owner.soils.index')" :active="request()->routeIs('farm_owner.soils.index')">
                <svg class="w-5 h-5 mr-3 shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"></path></svg>
                {{ __('Soil Scans') }}
            </x-sidebar-link>
        </div>
    </div>
</aside>

<!-- Top Navbar -->
<nav x-data="{ open: false }" class="fixed top-0 right-0 left-0 md:left-64 h-16 bg-white border-b border-gray-200 z-20">
    <div class="flex items-center justify-between h-full px-4 sm:px-6 lg:px-8">
        <!-- Mobile: Hamburger + Logo -->
        <div class="flex items-center md:hidden">
            <button @click="open = !open" class="inline-flex items-center justify-center p-2 rounded-md text-[#4f7942] hover:bg-gray-100 focus:outline-none transition duration-150 ease-in-out">
                <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                    <path :class="{'hidden': open, 'inline-flex': ! open }" class="inline-flex" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                    <path :class="{'hidden': ! open, 'inline-flex': open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
            <a href="{{ route('farm_owner.dashboard') }}" class="ml-2 flex items-center space-x-2">
                <x-application-logo class="block h-8 w-auto fill-current text-[#4f7942]" />
                <span class="text-[#4f7942] font-semibold">CashewSense</span>
            </a>
        </div>

        <!-- Desktop: empty spacer -->
        <div class="hidden md:block"></div>

        <!-- Profile & Logout Dropdown -->
        <div class="flex items-center">
            <x-dropdown align="right" width="48">
                <x-slot name="trigger">
                    <button class="inline-flex items-center px-3 py-2 border border-gray-200 text-sm leading-4 font-medium rounded-md text-[#2c3e2d] bg-white hover:bg-gray-50 focus:outline-none transition ease-in-out duration-150">
                        <svg class="w-5 h-5 mr-2 text-[#4f7942]" fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                        <span>{{ Auth::guard('farm_owner')->check() ? Auth::guard('farm_owner')->user()->name : Auth::user()->name }}</span>
                        <svg class="fill-current h-4 w-4 ml-1" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20">
                            <path fill-rule="evenodd" d="M5.293 7.293a1 1 0 011.414 0L10 10.586l3.293-3.293a1 1 0 111.414 1.414l-4 4a1 1 0 01-1.414 0l-4-4a1 1 0 010-1.414z" clip-rule="evenodd" />
                        </svg>
                    </button>
                </x-slot>

                <x-slot name="content">
                    <x-dropdown-link :href="route('farm_owner.profile.edit')">
                        {{ __('Profile') }}
                    </x-dropdown-link>

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
    </div>

    <!-- Mobile Navigation Dropdown -->
    <div :class="{'block': open, 'hidden': ! open}" class="hidden md:hidden absolute top-16 left-0 right-0 bg-white border-b border-gray-200 shadow-lg z-20">
        <div class="pt-2 pb-3 space-y-1">
            <x-responsive-nav-link :href="route('farm_owner.dashboard')" :active="request()->routeIs('farm_owner.dashboard')">
                {{ __('Dashboard') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('farm_owner.customers.index')" :active="request()->routeIs('farm_owner.customers.index')">
                {{ __('Customers') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('farm_owner.leafs.index')" :active="request()->routeIs('farm_owner.leafs.index')">
                {{ __('Leaf Scans') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('farm_owner.pests.index')" :active="request()->routeIs('farm_owner.pests.index')">
                {{ __('Pest Scans') }}
            </x-responsive-nav-link>
            <x-responsive-nav-link :href="route('farm_owner.soils.index')" :active="request()->routeIs('farm_owner.soils.index')">
                {{ __('Soil Scans') }}
            </x-responsive-nav-link>
        </div>
    </div>
</nav>
