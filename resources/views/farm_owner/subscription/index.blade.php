<x-farm-owner-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subscription Details') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            @if(session('success'))
                <div class="mb-4 bg-green-100 border border-green-400 text-green-700 px-4 py-3 rounded relative">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div class="mb-4 bg-red-100 border border-red-400 text-red-700 px-4 py-3 rounded relative">
                    {{ session('error') }}
                </div>
            @endif

            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg mb-6">
                <div class="p-6 text-gray-900">
                    <h3 class="text-lg font-bold text-gray-800 mb-4">Your Current Plan</h3>
                    <div class="bg-[#f0f9ff] border border-blue-200 rounded-xl p-6 shadow-sm">
                        <div class="grid grid-cols-1 md:grid-cols-3 gap-4">
                            <div>
                                <span class="text-xs uppercase font-semibold text-gray-500 block">Plan</span>
                                <span class="text-xl font-bold text-blue-900">{{ $farmOwner->subscription->name ?? 'Free Tier' }}</span>
                            </div>
                            <div>
                                <span class="text-xs uppercase font-semibold text-gray-500 block">Limit</span>
                                <span class="text-xl font-bold text-blue-900">{{ $farmOwner->farmer_limit }} Farmers</span>
                            </div>
                            <div>
                                <span class="text-xs uppercase font-semibold text-gray-500 block">Usage</span>
                                <span class="text-xl font-bold text-blue-900">{{ $farmOwner->farmer_count }} Farmers</span>
                            </div>
                        </div>
                        <div class="mt-4">
                            <div class="w-full bg-blue-100 rounded-full h-2.5 mb-2">
                                @php
                                    $percentage = ($farmOwner->farmer_limit > 0) ? ($farmOwner->farmer_count / $farmOwner->farmer_limit) * 100 : 100;
                                    $percentage = min($percentage, 100);
                                    $barColor = $percentage > 90 ? 'bg-red-600' : ($percentage > 70 ? 'bg-yellow-500' : 'bg-green-600');
                                @endphp
                                <div class="{{ $barColor }} h-2.5 rounded-full" style="width: {{ $percentage }}%"></div>
                            </div>
                            <p class="text-xs text-blue-700 font-medium">{{ round($percentage) }}% Capacity used</p>
                        </div>
                    </div>

                    @if($pendingRequest)
                        <div class="mt-4 bg-yellow-50 border-l-4 border-yellow-400 p-4">
                            <div class="flex">
                                <div class="flex-shrink-0">
                                    <svg class="h-5 w-5 text-yellow-400" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75 1.334-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div class="ml-3">
                                    <p class="text-sm text-yellow-700">
                                        Pending request: <strong>{{ $pendingRequest->subscription->name }}</strong>. 
                                        Wait for admin approval.
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <h3 class="text-lg font-bold text-gray-800 mb-4 px-4 sm:px-0">Available Plans</h3>
            <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                @foreach($subscriptions as $sub)
                    @php
                        $isCurrent = $farmOwner->subscription_id == $sub->id || ($farmOwner->subscription_id == null && $sub->limit == 10);
                        $isUpgrade = !$isCurrent && ($sub->limit > $farmOwner->farmer_limit);
                    @endphp
                    <div class="bg-white border {{ $isCurrent ? 'border-[#4f7942] ring-2 ring-[#4f7942]/20' : 'border-gray-200' }} rounded-xl shadow-sm overflow-hidden flex flex-col">
                        <div class="p-6 flex-1">
                            <div class="flex justify-between items-start mb-4">
                                <h4 class="text-xl font-bold text-gray-900">{{ $sub->name }}</h4>
                                @if($isCurrent)
                                    <span class="bg-green-100 text-green-800 text-xs px-2 py-1 rounded-full font-bold">Current</span>
                                @endif
                            </div>
                            <div class="mb-6">
                                <span class="text-3xl font-black text-[#2c3e2d]">{{ $sub->limit }}</span>
                                <span class="text-gray-500 ml-1">Farmers</span>
                            </div>
                            <ul class="space-y-3 text-sm text-gray-600 mb-6">
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    Manage up to {{ $sub->limit }} farmers
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    Technical Support
                                </li>
                                <li class="flex items-center">
                                    <svg class="w-4 h-4 mr-2 text-green-500" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    Usage Analytics
                                </li>
                            </ul>
                        </div>
                        <div class="p-4 bg-gray-50 border-t border-gray-100">
                            @if($isCurrent)
                                <button disabled class="w-full py-2 px-4 rounded font-bold bg-gray-200 text-gray-500 cursor-not-allowed">
                                    Your Active Plan
                                </button>
                            @elseif($isUpgrade)
                                <form action="{{ route('farm_owner.subscription.request') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="subscription_id" value="{{ $sub->id }}">
                                    <button type="submit" {{ $pendingRequest ? 'disabled' : '' }} 
                                            class="w-full py-2 px-4 rounded font-bold transition-colors duration-200 
                                                   {{ $pendingRequest ? 'bg-gray-300 text-gray-500 cursor-not-allowed' : 'bg-[#4f7942] hover:bg-[#3b5b31] text-white shadow-sm' }}">
                                        {{ $pendingRequest ? 'Request Pending' : 'Request Upgrade' }}
                                    </button>
                                </form>
                            @else
                                <button disabled class="w-full py-2 px-4 rounded font-bold bg-gray-100 text-gray-400 cursor-not-allowed">
                                    N/A
                                </button>
                            @endif
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
</x-farm-owner-app-layout>
