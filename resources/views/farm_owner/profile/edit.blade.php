<x-farm-owner-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Farm Owner Profile') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 space-y-6">
            
            <!-- Unique Code Display (Prominent) -->
            <div class="p-4 sm:p-8 bg-[#f5f5dc] border-l-4 border-[#4f7942] shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Your Unique Code') }}
                        </h2>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __("Use this code to identify your farm.") }}
                        </p>
                    </header>
                    <div class="mt-4">
                        <span class="px-6 py-3 bg-white text-3xl font-black text-[#4f7942] rounded-lg shadow-sm tracking-widest border border-green-200">
                            {{ $owner->unique_code }}
                        </span>
                    </div>
                </div>
            </div>

            <!-- Profile Information -->
            <div class="p-4 sm:p-8 bg-white shadow sm:rounded-lg">
                <div class="max-w-xl">
                    <header>
                        <h2 class="text-lg font-medium text-gray-900">
                            {{ __('Profile Information') }}
                        </h2>
                        <p class="mt-1 text-sm text-gray-600">
                            {{ __("Update your account's profile information and email address.") }}
                        </p>
                    </header>

                    <!-- We use a custom form for Farm Owners or just read-only info depending on requirements -->
                    <!-- For now, we will display the info read-only. If updating is needed, we would create a new form and controller method. -->
                    
                    <div class="mt-6 space-y-6">
                        <div>
                            <x-input-label for="name" :value="__('Name')" />
                            <p class="mt-1 text-gray-900 bg-gray-50 border border-gray-300 rounded-md px-3 py-2 cursor-not-allowed">{{ $owner->name }}</p>
                        </div>

                        <div>
                            <x-input-label for="email" :value="__('Email')" />
                            <p class="mt-1 text-gray-900 bg-gray-50 border border-gray-300 rounded-md px-3 py-2 cursor-not-allowed">{{ $owner->email }}</p>
                        </div>
                    </div>
                </div>
            </div>

            <!-- If you want to allow password updates for Farm Owners, include it here. Leaving out for now to keep it simple, but can add if requested. -->

        </div>
    </div>
</x-app-layout>
