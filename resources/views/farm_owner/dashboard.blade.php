<x-farm-owner-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#2c3e2d] leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    {{-- Welcome Banner --}}
    <div class="bg-gradient-to-r from-[#4f7942] to-[#3b5b31] rounded-xl p-6 mb-6 text-white">
        <div class="flex items-center justify-between">
            <div>
                <h3 class="text-2xl font-bold mb-1">Welcome back, {{ Auth::guard('farm_owner')->user()->name ?? 'Farm Owner' }}!</h3>
                <p class="text-green-100">You're logged in to the Farm Owner Dashboard.</p>
            </div>
            <div class="hidden sm:block rounded-xl px-5 py-3 text-center" style="background: rgba(255,255,255,0.15);">
                <span class="block text-xs uppercase font-semibold tracking-wider" style="color: #bbf7d0;">Your Unique Code</span>
                <span class="block text-2xl font-black tracking-widest mt-1" style="color: #ffffff;">{{ Auth::guard('farm_owner')->user()->unique_code }}</span>
            </div>
        </div>
    </div>

    {{-- Cards Grid --}}
    <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
        {{-- Farm Overview --}}
        <div class="bg-white rounded-xl border border-gray-200 p-5 hover:shadow-md transition-shadow">
            <div class="flex items-center">
                <div class="p-3 rounded-xl bg-[#eef1e6] text-[#4f7942]">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-lg font-semibold text-gray-700">Your Farm</p>
                    <p class="text-sm text-gray-500 mt-1">Manage farm properties and details here.</p>
                </div>
            </div>
        </div>

        {{-- Profile Management --}}
        <a href="{{ route('farm_owner.profile.edit') }}" class="bg-white rounded-xl border border-gray-200 p-5 hover:shadow-md transition-shadow block">
            <div class="flex items-center">
                <div class="p-3 rounded-xl bg-green-50 text-green-600">
                    <svg class="w-7 h-7" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                    </svg>
                </div>
                <div class="ml-4">
                    <p class="text-lg font-semibold text-gray-700">Profile Management</p>
                    <p class="text-sm text-gray-500 mt-1">View your unique code and profile info.</p>
                </div>
            </div>
        </a>
    </div>
</x-farm-owner-app-layout>
