<x-farm-owner-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Farm Owner Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6 border-l-4 border-[#4f7942]">
                <div class="p-6 text-gray-900 flex justify-between items-start">
                    <div>
                        <h3 class="text-lg font-medium mb-2 text-[#2c3e2d]">Welcome Back, {{ Auth::guard('farm_owner')->user()->name ?? 'Farm Owner' }}!</h3>
                        <p class="text-gray-600">{{ __("You're logged in to the Farm Owner Dashboard.") }}</p>
                    </div>
                    <div class="bg-[#f5f5dc] border border-[#4f7942] rounded px-4 py-2 text-center">
                        <span class="block text-xs text-gray-500 uppercase font-semibold">Your Unique Code</span>
                        <span class="block text-xl font-bold text-[#4f7942] tracking-wider">{{ Auth::guard('farm_owner')->user()->unique_code }}</span>
                    </div>
                </div>
            </div>

            <!-- Dashboard Modules (Placeholders for future additions) -->
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <!-- Farm Overview -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-[#f5f5dc] text-[#4f7942]">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 12l2-2m0 0l7-7 7 7M5 10v10a1 1 0 001 1h3m10-11l2 2m-2-2v10a1 1 0 01-1 1h-3m-6 0a1 1 0 001-1v-4a1 1 0 011-1h2a1 1 0 011 1v4a1 1 0 001 1m-6 0h6"></path></svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-semibold text-gray-600">Your Farm</h4>
                                <p class="text-sm text-gray-500 mt-1">Manage farm properties and details here.</p>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Profile Overview -->
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg hover:bg-gray-50 transition">
                    <a href="{{ route('farm_owner.profile.edit') }}" class="block p-6">
                        <div class="flex items-center">
                            <div class="p-3 rounded-full bg-[#e6f4ea] text-[#34a853]">
                                <svg class="w-8 h-8" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                            </div>
                            <div class="ml-4">
                                <h4 class="text-lg font-semibold text-gray-600">Profile Management</h4>
                                <p class="text-sm text-gray-500 mt-1">View your unique code and profile info.</p>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

        </div>
    </div>
</x-app-layout>
