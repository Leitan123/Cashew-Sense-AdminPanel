<x-farm-owner-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#2c3e2d] leading-tight">
            {{ __('My Customers') }}
        </h2>
    </x-slot>

    <div class="bg-white rounded-xl border border-gray-200">
        <div class="p-5 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-[#2c3e2d]">Customers Under Your Code</h3>
            <p class="text-sm text-gray-500 mt-1">Customers registered with your employee code</p>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-[#f8f9f5] border-b border-gray-200">
                        <th class="px-5 py-3 text-left text-xs font-semibold text-[#4f7942] uppercase tracking-wider">ID</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-[#4f7942] uppercase tracking-wider">Name</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-[#4f7942] uppercase tracking-wider">Phone</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-[#4f7942] uppercase tracking-wider">District</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-[#4f7942] uppercase tracking-wider">Farm Size (Acres)</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-[#4f7942] uppercase tracking-wider">Leaf Scans</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-[#4f7942] uppercase tracking-wider">Pest Scans</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-[#4f7942] uppercase tracking-wider">Joined Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($customers as $customer)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-5 py-4 text-sm text-gray-500">{{ $customer->id }}</td>
                            <td class="px-5 py-4 text-sm font-medium text-gray-900">{{ $customer->name }}</td>
                            <td class="px-5 py-4 text-sm text-gray-500">{{ $customer->phone }}</td>
                            <td class="px-5 py-4 text-sm text-gray-500">{{ $customer->district }}</td>
                            <td class="px-5 py-4 text-sm text-gray-500">{{ $customer->farm_size }}</td>
                            <td class="px-5 py-4 text-sm text-gray-500">
                                <span class="px-2 py-0.5 text-xs font-semibold rounded-full bg-green-50 text-green-700">
                                    {{ $customer->leaf_scans_count }}
                                </span>
                            </td>
                            <td class="px-5 py-4 text-sm text-gray-500">
                                <span class="px-2 py-0.5 text-xs font-semibold rounded-full bg-red-50 text-red-700">
                                    {{ $customer->pest_scans_count }}
                                </span>
                            </td>
                            <td class="px-5 py-4 text-sm text-gray-500">{{ $customer->created_at->format('M d, Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-5 py-8 text-sm text-center text-gray-400">
                                No customers registered under your code yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($customers->hasPages())
            <div class="px-5 py-4 border-t border-gray-200">
                {{ $customers->links() }}
            </div>
        @endif
    </div>
</x-farm-owner-app-layout>
