<x-farm-owner-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#2c3e2d] leading-tight">
            {{ __('My Profile') }}
        </h2>
    </x-slot>

    <div class="max-w-3xl space-y-6">
        {{-- Unique Code --}}
        <div class="bg-white rounded-xl border border-gray-200 p-6">
            <header>
                <h2 class="text-lg font-semibold text-[#2c3e2d]">Your Unique Code</h2>
                <p class="mt-1 text-sm text-gray-500">Use this code to identify your farm.</p>
            </header>
            <div class="mt-4">
                <span class="inline-block px-6 py-3 text-3xl font-black rounded-lg tracking-widest border border-green-200" style="background-color: #eef1e6; color: #4f7942;">
                    {{ $owner->unique_code }}
                </span>
            </div>
        </div>

        {{-- Profile Information --}}
        <div class="bg-white rounded-xl border border-gray-200 p-6">
            <header>
                <h2 class="text-lg font-semibold text-[#2c3e2d]">Profile Information</h2>
                <p class="mt-1 text-sm text-gray-500">Your account details.</p>
            </header>
            <div class="mt-6 space-y-4">
                <div>
                    <x-input-label for="name" :value="__('Name')" />
                    <p class="mt-1 text-gray-900 bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5">{{ $owner->name }}</p>
                </div>
                <div>
                    <x-input-label for="email" :value="__('Email')" />
                    <p class="mt-1 text-gray-900 bg-gray-50 border border-gray-200 rounded-lg px-4 py-2.5">{{ $owner->email }}</p>
                </div>
            </div>
        </div>
    </div>
</x-farm-owner-app-layout>
