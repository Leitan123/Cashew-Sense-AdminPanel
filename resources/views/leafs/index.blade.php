<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Leaf Disease Scans') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900 overflow-x-auto">
                    
                    <h3 class="text-lg font-medium mb-4 text-[#2c3e2d]">Recent AI Leaf Detections</h3>
                    
                    <table class="min-w-full divide-y divide-gray-200">
                        <thead class="bg-[#f5f5dc]">
                            <tr>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#4f7942] uppercase tracking-wider">ID</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#4f7942] uppercase tracking-wider">Image</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#4f7942] uppercase tracking-wider">Customer Name</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#4f7942] uppercase tracking-wider">Phone</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#4f7942] uppercase tracking-wider">Detection Result</th>
                                <th scope="col" class="px-6 py-3 text-left text-xs font-medium text-[#4f7942] uppercase tracking-wider">Scan Date</th>
                            </tr>
                        </thead>
                        <tbody class="bg-white divide-y divide-gray-200">
                            @forelse($scans as $scan)
                                <tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $scan->id }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        @if($scan->image_url && $scan->image_url != 'placeholder')
                                            <a href="{{ asset($scan->image_url) }}" target="_blank">
                                                <img src="{{ asset($scan->image_url) }}" alt="Scan Image" class="h-16 w-16 object-cover rounded-md border border-gray-300 shadow-sm">
                                            </a>
                                        @else
                                            <span class="text-gray-400 italic">No image</span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-900">{{ $scan->customer ? $scan->customer->name : 'Unknown Customer' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">{{ $scan->customer ? $scan->customer->phone : 'N/A' }}</td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-semibold">
                                        @if(strtolower($scan->disease_name) == 'healthy')
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-green-100 text-green-800">
                                                {{ str_replace('_', ' ', $scan->disease_name) }}
                                            </span>
                                        @else
                                            <span class="px-2 inline-flex text-xs leading-5 font-semibold rounded-full bg-red-100 text-red-800">
                                                {{ str_replace('_', ' ', $scan->disease_name) }}
                                            </span>
                                        @endif
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-500">
                                        {{ \Carbon\Carbon::createFromTimestampMs($scan->scan_timestamp)->format('M d, Y h:i A') }}
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="6" class="px-6 py-4 whitespace-nowrap text-sm text-center text-gray-500">
                                        No leaf scans recorded yet.
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="mt-4">
                        {{ $scans->links() }}
                    </div>

                </div>
            </div>
        </div>
    </div>
</x-app-layout>
