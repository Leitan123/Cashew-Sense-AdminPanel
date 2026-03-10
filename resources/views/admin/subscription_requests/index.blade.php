<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Subscription Upgrade Requests') }}
        </h2>
    </x-slot>

    <div class="py-12" style="padding-top: 3rem; padding-bottom: 3rem; font-family: 'Figtree', ui-sans-serif, system-ui, sans-serif;">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8" style="max-width: 80rem; margin-left: auto; margin-right: auto; padding-left: 1.5rem; padding-right: 1.5rem;">
            @if(session('success'))
                <div style="margin-bottom: 1rem; background-color: #d1fae5; border: 1px solid #34d399; color: #065f46; padding: 0.75rem 1rem; border-radius: 0.5rem; position: relative;">
                    {{ session('success') }}
                </div>
            @endif

            <div style="background-color: white; overflow: hidden; box-shadow: 0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06); border-radius: 0.5rem;">
                <div style="padding: 1.5rem; color: #111827;">
                    <div style="overflow-x: auto;">
                        <table style="min-width: 100%; border-collapse: collapse;">
                            <thead style="background-color: #f9fafb; border-bottom: 1px solid #e5e7eb;">
                                <tr>
                                    <th style="padding: 0.75rem 1.5rem; text-align: left; font-size: 0.75rem; font-weight: 500; color: #6b7280; text-transform: uppercase; letter-spacing: 0.05em;">Farm Owner</th>
                                    <th style="padding: 0.75rem 1.5rem; text-align: left; font-size: 0.75rem; font-weight: 500; color: #6b7280; text-transform: uppercase; letter-spacing: 0.05em;">Target Plan</th>
                                    <th style="padding: 0.75rem 1.5rem; text-align: left; font-size: 0.75rem; font-weight: 500; color: #6b7280; text-transform: uppercase; letter-spacing: 0.05em;">Status</th>
                                    <th style="padding: 0.75rem 1.5rem; text-align: left; font-size: 0.75rem; font-weight: 500; color: #6b7280; text-transform: uppercase; letter-spacing: 0.05em;">Requested At</th>
                                    <th style="padding: 0.75rem 1.5rem; text-align: center; font-size: 0.75rem; font-weight: 500; color: #6b7280; text-transform: uppercase; letter-spacing: 0.05em;">Actions</th>
                                </tr>
                            </thead>
                            <tbody style="background-color: white;">
                                @forelse($requests as $request)
                                    <tr style="border-bottom: 1px solid #e5e7eb;">
                                        <td style="padding: 1rem 1.5rem; white-space: nowrap;">
                                            <div style="font-size: 0.875rem; font-weight: 500; color: #111827;">{{ $request->farmOwner->name }}</div>
                                            <div style="font-size: 0.75rem; color: #6b7280;">{{ $request->farmOwner->unique_code }}</div>
                                        </td>
                                        <td style="padding: 1rem 1.5rem; white-space: nowrap;">
                                            <div style="font-size: 0.875rem; color: #111827; font-weight: 700;">{{ $request->subscription->name }}</div>
                                            <div style="font-size: 0.75rem; color: #6b7280;">{{ $request->subscription->limit }} Farmers Limit</div>
                                        </td>
                                        <td style="padding: 1rem 1.5rem; white-space: nowrap;">
                                            @if($request->status == 'pending')
                                                <span style="padding: 0.25rem 0.5rem; display: inline-flex; font-size: 0.75rem; font-weight: 600; border-radius: 9999px; background-color: #fef3c7; color: #92400e;">Pending</span>
                                            @elseif($request->status == 'approved')
                                                <span style="padding: 0.25rem 0.5rem; display: inline-flex; font-size: 0.75rem; font-weight: 600; border-radius: 9999px; background-color: #dcfce7; color: #166534;">Approved</span>
                                            @else
                                                <span style="padding: 0.25rem 0.5rem; display: inline-flex; font-size: 0.75rem; font-weight: 600; border-radius: 9999px; background-color: #fee2e2; color: #991b1b;">Rejected</span>
                                            @endif
                                        </td>
                                        <td style="padding: 1rem 1.5rem; white-space: nowrap; font-size: 0.875rem; color: #6b7280;">
                                            {{ $request->created_at->format('M d, Y H:i') }}
                                        </td>
                                        <td style="padding: 1rem 1.5rem; white-space: nowrap; text-align: center; font-size: 0.875rem; font-weight: 500;">
                                            @if($request->status == 'pending')
                                                <div style="display: flex; justify-content: center; gap: 0.5rem;">
                                                    <form action="{{ route('admin.subscription_requests.approve', $request->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" style="background-color: #16a34a; cursor: pointer; color: white; padding: 0.25rem 0.75rem; border-radius: 0.25rem; font-size: 0.75rem; border: none; transition: background-color 0.2s;">Approve</button>
                                                    </form>
                                                    <form action="{{ route('admin.subscription_requests.reject', $request->id) }}" method="POST">
                                                        @csrf
                                                        <button type="submit" style="background-color: #dc2626; cursor: pointer; color: white; padding: 0.25rem 0.75rem; border-radius: 0.25rem; font-size: 0.75rem; border: none; transition: background-color 0.2s;">Reject</button>
                                                    </form>
                                                </div>
                                            @else
                                                <span style="color: #9ca3af;">Processed</span>
                                            @endif
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="5" style="padding: 2.5rem 1.5rem; text-align: center; color: #6b7280; font-style: italic;">
                                            No subscription requests found.
                                        </td>
                                    </tr>
                                @endforelse
                            </tbody>
                        </table>
                    </div>
                    <div style="margin-top: 1rem;">
                        {{ $requests->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
