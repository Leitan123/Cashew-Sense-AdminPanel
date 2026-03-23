<aside
    :class="sidebarOpen ? 'translate-x-0' : '-translate-x-full'"
    class="fixed inset-y-0 left-0 z-40 w-64 bg-[#2c3e2d] text-white transition-transform duration-300 ease-in-out lg:translate-x-0 flex flex-col"
>
    {{-- Logo / Brand --}}
    <div class="flex items-center justify-between h-16 px-5 border-b border-[#3b5b31] shrink-0">
        <a href="{{ route('dashboard') }}" class="flex items-center space-x-3">
            <div class="w-8 h-8 bg-[#4f7942] rounded-lg flex items-center justify-center">
                <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 3v4M3 5h4M6 17v4m-2-2h4m5-16l2.286 6.857L21 12l-5.714 2.143L13 21l-2.286-6.857L5 12l5.714-2.143L13 3z"/>
                </svg>
            </div>
            <span class="text-lg font-bold tracking-wide">CashewSense</span>
        </a>
        {{-- Close button (mobile) --}}
        <button @click="sidebarOpen = false" class="lg:hidden p-1 rounded-md hover:bg-[#3b5b31] focus:outline-none">
            <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12"/>
            </svg>
        </button>
    </div>

    {{-- Navigation Links --}}
    <nav class="flex-1 px-3 py-4 space-y-1 overflow-y-auto">
        <p class="px-3 mb-2 text-xs font-semibold uppercase tracking-wider text-gray-400">Main</p>

        {{-- Dashboard --}}
        <a href="{{ route('dashboard') }}"
           class="flex items-center px-3 py-2.5 rounded-lg text-sm font-medium transition-colors duration-150
                  {{ request()->routeIs('dashboard') ? 'bg-[#4f7942] text-white' : 'text-gray-300 hover:bg-[#3b5b31] hover:text-white' }}">
            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
            </svg>
            Dashboard
        </a>

        <p class="px-3 mt-5 mb-2 text-xs font-semibold uppercase tracking-wider text-gray-400">Management</p>

        {{-- Customers --}}
        <a href="{{ route('customers.index') }}"
           class="flex items-center px-3 py-2.5 rounded-lg text-sm font-medium transition-colors duration-150
                  {{ request()->routeIs('customers.index') ? 'bg-[#4f7942] text-white' : 'text-gray-300 hover:bg-[#3b5b31] hover:text-white' }}">
            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"/>
            </svg>
            Customers
        </a>

        {{-- Farm Owners --}}
        <a href="{{ route('farm-owners.index') }}"
           class="flex items-center px-3 py-2.5 rounded-lg text-sm font-medium transition-colors duration-150
                  {{ request()->routeIs('farm-owners.index') ? 'bg-[#4f7942] text-white' : 'text-gray-300 hover:bg-[#3b5b31] hover:text-white' }}">
            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m-5 10v-5a1 1 0 011-1h2a1 1 0 011 1v5m-4 0h4"/>
            </svg>
            Farm Owners
        </a>

        {{-- Subscription Requests --}}
        <a href="{{ route('admin.subscription_requests.index') }}"
           class="flex items-center px-3 py-2.5 rounded-lg text-sm font-medium transition-colors duration-150"
           style="{{ request()->routeIs('admin.subscription_requests.index') ? 'background-color: #4f7942; color: white;' : 'color: #d1d5db;' }}">
            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 5v2m0 4v2m0 4v2M5 5a2 2 0 012-2h3.28a2 2 0 011.664.89l.812 1.22A2 2 0 0014.412 6H19a2 2 0 012 2v10a2 2 0 01-2 2H7a2 2 0 01-2-2V5z"/>
            </svg>
            Subscription Requests
        </a>

        <p class="px-3 mt-5 mb-2 text-xs font-semibold uppercase tracking-wider text-gray-400">Scan Records</p>

        {{-- Leaf Scans --}}
        <a href="{{ route('leafs.index') }}"
           class="flex items-center px-3 py-2.5 rounded-lg text-sm font-medium transition-colors duration-150
                  {{ request()->routeIs('leafs.index') ? 'bg-[#4f7942] text-white' : 'text-gray-300 hover:bg-[#3b5b31] hover:text-white' }}">
            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m2 5H7a2 2 0 01-2-2V5a2 2 0 012-2h5.586a1 1 0 01.707.293l5.414 5.414a1 1 0 01.293.707V19a2 2 0 01-2 2z"/>
            </svg>
            Leaf Scans
        </a>

        {{-- Pest Scans --}}
        <a href="{{ route('pests.index') }}"
           class="flex items-center px-3 py-2.5 rounded-lg text-sm font-medium transition-colors duration-150
                  {{ request()->routeIs('pests.index') ? 'bg-[#4f7942] text-white' : 'text-gray-300 hover:bg-[#3b5b31] hover:text-white' }}">
            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-2.5L13.732 4.5c-.77-.833-2.694-.833-3.464 0L3.34 16.5c-.77.833.192 2.5 1.732 2.5z"/>
            </svg>
            Pest Scans
        </a>

        {{-- Soil Scans --}}
        <a href="{{ route('soils.index') }}"
           class="flex items-center px-3 py-2.5 rounded-lg text-sm font-medium transition-colors duration-150
                  {{ request()->routeIs('soils.index') ? 'bg-[#4f7942] text-white' : 'text-gray-300 hover:bg-[#3b5b31] hover:text-white' }}">
            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3.055 11H5a2 2 0 012 2v1a2 2 0 002 2 2 2 0 012 2v2.945M8 3.935V5.5A2.5 2.5 0 0010.5 8h.5a2 2 0 012 2 2 2 0 104 0 2 2 0 012-2h1.064M15 20.488V18a2 2 0 012-2h3.064M21 12a9 9 0 11-18 0 9 9 0 0118 0z"/>
            </svg>
            Soil Scans
        </a>

        {{-- Nut Scans --}}
        <a href="{{ route('nuts.index') }}"
           class="flex items-center px-3 py-2.5 rounded-lg text-sm font-medium transition-colors duration-150
                  {{ request()->routeIs('nuts.index') ? 'bg-[#4f7942] text-white' : 'text-gray-300 hover:bg-[#3b5b31] hover:text-white' }}">
            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <circle cx="12" cy="12" r="8" stroke="currentColor" stroke-width="2" fill="none" />
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4v4m0 8v4m-8-8h4m8 0h4" />
            </svg>
            Nut Scans
        </a>
    </nav>

    {{-- Sidebar Footer --}}
    <div class="px-3 py-4 border-t border-[#3b5b31] shrink-0">
        <a href="{{ route('profile.edit') }}"
           class="flex items-center px-3 py-2.5 rounded-lg text-sm font-medium text-gray-300 hover:bg-[#3b5b31] hover:text-white transition-colors duration-150">
            <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.066 2.573c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.573 1.066c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.066-2.573c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            Settings
        </a>
        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit"
                    class="w-full flex items-center px-3 py-2.5 rounded-lg text-sm font-medium text-gray-300 hover:bg-red-600/20 hover:text-red-400 transition-colors duration-150">
                <svg class="w-5 h-5 mr-3 flex-shrink-0" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"/>
                </svg>
                Log Out
            </button>
        </form>
    </div>
</aside>
