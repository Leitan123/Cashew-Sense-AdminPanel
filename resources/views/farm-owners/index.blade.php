<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#2c3e2d] leading-tight">
            {{ __('Farm Owners') }}
        </h2>
    </x-slot>

    <div class="bg-white rounded-xl border border-gray-200">
        <div class="p-5 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-[#2c3e2d]">Cashew Farm Owners</h3>
            <p class="text-sm text-gray-500 mt-1">Manage all registered farm owners</p>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-[#f8f9f5] border-b border-gray-200">
                        <th class="px-5 py-3 text-left text-xs font-semibold text-[#4f7942] uppercase tracking-wider">ID</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-[#4f7942] uppercase tracking-wider">Unique Code</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-[#4f7942] uppercase tracking-wider">Name</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-[#4f7942] uppercase tracking-wider">Email</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-[#4f7942] uppercase tracking-wider">Joined Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($farmOwners as $owner)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-5 py-4 text-sm text-gray-500">{{ $owner->id }}</td>
                            <td class="px-5 py-4 text-sm font-bold text-[#4f7942]">{{ $owner->unique_code ?? '-' }}</td>
                            <td class="px-5 py-4 text-sm font-medium text-gray-900">{{ $owner->name }}</td>
                            <td class="px-5 py-4 text-sm text-gray-500">{{ $owner->email }}</td>
                            <td class="px-5 py-4 text-sm text-gray-500">{{ $owner->created_at->format('M d, Y') }}</td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="px-5 py-8 text-sm text-center text-gray-400">
                                No registered farm owners yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($farmOwners->hasPages())
            <div class="px-5 py-4 border-t border-gray-200">
                {{ $farmOwners->links() }}
            </div>
        @endif
    </div>
</x-app-layout>
