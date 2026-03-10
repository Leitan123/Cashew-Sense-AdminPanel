<x-farm-owner-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subscription Details') }}
        </h2>
    </x-slot>

    <div class="py-12" style="padding-top: 3rem; padding-bottom: 3rem; font-family: 'Figtree', ui-sans-serif, system-ui, sans-serif;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="max-width: 80rem; margin-left: auto; margin-right: auto; padding-left: 1.5rem; padding-right: 1.5rem;">
            @if(session('success'))
                <div style="margin-bottom: 1rem; background-color: #d1fae5; border: 1px solid #34d399; color: #065f46; padding: 0.75rem 1rem; border-radius: 0.5rem; position: relative;">
                    {{ session('success') }}
                </div>
            @endif
            @if(session('error'))
                <div style="margin-bottom: 1rem; background-color: #fee2e2; border: 1px solid #f87171; color: #991b1b; padding: 0.75rem 1rem; border-radius: 0.5rem; position: relative;">
                    {{ session('error') }}
                </div>
            @endif

            <div style="background-color: white; overflow: hidden; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06); border-radius: 0.5rem; margin-bottom: 1.5rem;">
                <div style="padding: 1.5rem;">
                    <h3 style="font-size: 1.125rem; font-weight: 700; color: #1f2937; margin-bottom: 1rem;">Your Current Plan</h3>
                    
                    <div style="background-color: #f0f9ff; border: 1px solid #bae6fd; border-radius: 0.75rem; padding: 1.5rem; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);">
                        <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(200px, 1fr)); gap: 1rem;">
                            <div>
                                <span style="font-size: 0.75rem; text-transform: uppercase; font-weight: 600; color: #6b7280; display: block;">Plan</span>
                                <span style="font-size: 1.25rem; font-weight: 700; color: #1e3a8a;">{{ $farmOwner->subscription->name ?? 'Free Tier' }}</span>
                            </div>
                            <div>
                                <span style="font-size: 0.75rem; text-transform: uppercase; font-weight: 600; color: #6b7280; display: block;">Limit</span>
                                <span style="font-size: 1.25rem; font-weight: 700; color: #1e3a8a;">{{ $farmOwner->farmer_limit }} Farmers</span>
                            </div>
                            <div>
                                <span style="font-size: 0.75rem; text-transform: uppercase; font-weight: 600; color: #6b7280; display: block;">Usage</span>
                                <span style="font-size: 1.25rem; font-weight: 700; color: #1e3a8a;">{{ $farmOwner->farmer_count }} Farmers</span>
                            </div>
                        </div>
                        
                        <div style="margin-top: 1rem;">
                            <div style="width: 100%; background-color: #dbeafe; border-radius: 9999px; height: 0.625rem; margin-bottom: 0.5rem; overflow: hidden;">
                                @php
                                    $percentage = ($farmOwner->farmer_limit > 0) ? ($farmOwner->farmer_count / $farmOwner->farmer_limit) * 100 : 100;
                                    $percentage = min($percentage, 100);
                                    $barColor = $percentage > 90 ? '#dc2626' : ($percentage > 70 ? '#eab308' : '#16a34a');
                                @endphp
                                <div style="background-color: {{ $barColor }}; height: 0.625rem; border-radius: 9999px; width: {{ $percentage }}%; transition: width 0.5s ease-in-out;"></div>
                            </div>
                            <p style="font-size: 0.75rem; color: #1d4ed8; font-weight: 500;">{{ round($percentage) }}% Capacity used</p>
                        </div>
                    </div>

                    @if($pendingRequest)
                        <div style="margin-top: 1rem; background-color: #fffbeb; border-left: 4px solid #f59e0b; padding: 1rem; border-radius: 0.25rem;">
                            <div style="display: flex; align-items: start;">
                                <div style="flex-shrink: 0;">
                                    <svg style="height: 1.25rem; width: 1.25rem; color: #f59e0b;" fill="currentColor" viewBox="0 0 20 20">
                                        <path fill-rule="evenodd" d="M8.257 3.099c.765-1.36 2.722-1.36 3.486 0l5.58 9.92c.75(1.334)-.213 2.98-1.742 2.98H4.42c-1.53 0-2.493-1.646-1.743-2.98l5.58-9.92zM11 13a1 1 0 11-2 0 1 1 0 012 0zm-1-8a1 1 0 00-1 1v3a1 1 0 002 0V6a1 1 0 00-1-1z" clip-rule="evenodd"/>
                                    </svg>
                                </div>
                                <div style="margin-left: 0.75rem;">
                                    <p style="font-size: 0.875rem; color: #b45309; margin: 0;">
                                        Pending request: <strong>{{ $pendingRequest->subscription->name }}</strong>. 
                                        Wait for admin approval.
                                    </p>
                                </div>
                            </div>
                        </div>
                    @endif
                </div>
            </div>

            <h3 style="font-size: 1.125rem; font-weight: 700; color: #1f2937; margin-bottom: 1rem; padding: 0 1rem;">Available Plans</h3>
            
            <div style="display: grid; grid-template-columns: repeat(auto-fit, minmax(300px, 1fr)); gap: 1.5rem; padding: 0 0.5rem;">
                @foreach($subscriptions as $sub)
                    @php
                        $isCurrent = $farmOwner->subscription_id == $sub->id || ($farmOwner->subscription_id == null && $sub->limit == 10);
                        $isUpgrade = !$isCurrent && ($sub->limit > $farmOwner->farmer_limit);
                    @endphp
                    <div style="background-color: white; border: 1px solid {{ $isCurrent ? '#4f7942' : '#e5e7eb' }}; outline: {{ $isCurrent ? '2px solid rgba(79, 121, 66, 0.2)' : 'none' }}; border-radius: 0.75rem; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05); overflow: hidden; display: flex; flex-direction: column;">
                        <div style="padding: 1.5rem; flex: 1;">
                            <div style="display: flex; justify-content: space-between; align-items: start; margin-bottom: 1rem;">
                                <h4 style="font-size: 1.25rem; font-weight: 700; color: #111827; margin: 0;">{{ $sub->name }}</h4>
                                @if($isCurrent)
                                    <span style="background-color: #dcfce7; color: #166534; font-size: 0.75rem; padding: 0.25rem 0.5rem; border-radius: 9999px; font-weight: 700;">Current</span>
                                @endif
                            </div>
                            
                            <div style="margin-bottom: 1.5rem;">
                                <span style="font-size: 1.875rem; font-weight: 900; color: #2c3e2d;">{{ $sub->limit }}</span>
                                <span style="color: #6b7280; margin-left: 0.25rem;">Farmers</span>
                            </div>
                            
                            <ul style="list-style: none; padding: 0; margin-bottom: 1.5rem;">
                                <li style="display: flex; align-items: center; font-size: 0.875rem; color: #4b5563; margin-bottom: 0.75rem;">
                                    <svg style="width: 1rem; height: 1rem; margin-right: 0.5rem; color: #22c55e;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    Manage up to {{ $sub->limit }} farmers
                                </li>
                                <li style="display: flex; align-items: center; font-size: 0.875rem; color: #4b5563; margin-bottom: 0.75rem;">
                                    <svg style="width: 1rem; height: 1rem; margin-right: 0.5rem; color: #22c55e;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    Technical Support
                                </li>
                                <li style="display: flex; align-items: center; font-size: 0.875rem; color: #4b5563;">
                                    <svg style="width: 1rem; height: 1rem; margin-right: 0.5rem; color: #22c55e;" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"/>
                                    </svg>
                                    Usage Analytics
                                </li>
                            </ul>
                        </div>
                        
                        <div style="padding: 1rem; background-color: #f9fafb; border-top: 1px solid #f3f4f6;">
                            @if($isCurrent)
                                <button disabled style="width: 100%; padding: 0.5rem 1rem; border-radius: 0.25rem; font-weight: 700; border: none; background-color: #e5e7eb; color: #6b7280; cursor: not-allowed;">
                                    Your Active Plan
                                </button>
                            @elseif($isUpgrade)
                                <form action="{{ route('farm_owner.subscription.request') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="subscription_id" value="{{ $sub->id }}">
                                    <button type="submit" {{ $pendingRequest ? 'disabled' : '' }} 
                                            style="width: 100%; padding: 0.5rem 1rem; border-radius: 0.25rem; font-weight: 700; border: none; cursor: {{ $pendingRequest ? 'not-allowed' : 'pointer' }}; transition: background-color 0.2s;
                                                   {{ $pendingRequest ? 'background-color: #d1d5db; color: #6b7280;' : 'background-color: #4f7942; color: white; box-shadow: 0 1px 2px 0 rgba(0, 0, 0, 0.05);' }}">
                                        {{ $pendingRequest ? 'Request Pending' : 'Request Upgrade' }}
                                    </button>
                                </form>
                            @else
                                <button disabled style="width: 100%; padding: 0.5rem 1rem; border-radius: 0.25rem; font-weight: 700; border: none; background-color: #f3f4f6; color: #9ca3af; cursor: not-allowed;">
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
