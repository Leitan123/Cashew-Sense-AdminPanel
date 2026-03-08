<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Registered Farm Owners') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 overflow-x-auto">
                    
                    <h3 class="text-lg font-medium mb-4 text-[#2c3e2d]">Cashew Farm Owners</h3>
                    
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-[#f5f5dc]">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#4f7942] uppercase tracking-wider">ID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#4f7942] uppercase tracking-wider">Unique Code</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#4f7942] uppercase tracking-wider">Name</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#4f7942] uppercase tracking-wider">Email</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#4f7942] uppercase tracking-wider">Joined Date</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($farmOwners as $owner)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $owner->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-bold text-[#4f7942]">{{ $owner->unique_code ?? '-' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900 border-l-2 border-[#4f7942]">{{ $owner->name }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $owner->email }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $owner->created_at->format('M d, Y') }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-500">
                                        No registered farm owners yet.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $farmOwners->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
