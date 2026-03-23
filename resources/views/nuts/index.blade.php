<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-[#2c3e2d] leading-tight">
            {{ __('Nut Scans') }}
        </h2>
    </x-slot>

    <div class="bg-white rounded-xl border border-gray-200">
        <div class="p-5 border-b border-gray-200">
            <h3 class="text-lg font-semibold text-[#2c3e2d]">Nut Grading Scans</h3>
            <p class="text-sm text-gray-500 mt-1">Recent AI nut classification and grading results</p>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead>
                    <tr class="bg-[#f8f9f5] border-b border-gray-200">
                        <th class="px-5 py-3 text-left text-xs font-semibold text-[#4f7942] uppercase tracking-wider">ID</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-[#4f7942] uppercase tracking-wider">Image</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-[#4f7942] uppercase tracking-wider">Customer Name</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-[#4f7942] uppercase tracking-wider">Phone</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-[#4f7942] uppercase tracking-wider">Predicted Class</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-[#4f7942] uppercase tracking-wider">Weight</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-[#4f7942] uppercase tracking-wider">Final Grade</th>
                        <th class="px-5 py-3 text-left text-xs font-semibold text-[#4f7942] uppercase tracking-wider">Scan Date</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-gray-100">
                    @forelse($scans as $scan)
                        <tr class="hover:bg-gray-50 transition-colors">
                            <td class="px-5 py-4 text-sm text-gray-500">{{ $scan->id }}</td>
                            <td class="px-5 py-4 text-sm text-gray-500">
                                @if($scan->image_url && $scan->image_url != 'placeholder')
                                    <a href="{{ asset($scan->image_url) }}" target="_blank">
                                        <img src="{{ asset($scan->image_url) }}" alt="Scan Image" class="h-12 w-12 object-cover rounded-lg border border-gray-200">
                                    </a>
                                @else
                                    <div class="h-12 w-12 rounded-lg bg-gray-100 flex items-center justify-center">
                                        <svg class="w-5 h-5 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16l4.586-4.586a2 2 0 012.828 0L16 16m-2-2l1.586-1.586a2 2 0 012.828 0L20 14m-6-6h.01M6 20h12a2 2 0 002-2V6a2 2 0 00-2-2H6a2 2 0 00-2 2v12a2 2 0 002 2z"/>
                                        </svg>
                                    </div>
                                @endif
                            </td>
                            <td class="px-5 py-4 text-sm font-medium text-gray-900">{{ $scan->customer ? $scan->customer->name : 'Unknown Customer' }}</td>
                            <td class="px-5 py-4 text-sm text-gray-500">{{ $scan->customer ? $scan->customer->phone : 'N/A' }}</td>
                            <td class="px-5 py-4 text-sm font-semibold">
                                <span class="px-2.5 py-1 text-xs font-semibold rounded-full bg-blue-50 text-blue-700">
                                    {{ $scan->predicted_class }}
                                </span>
                            </td>
                            <td class="px-5 py-4 text-sm font-semibold text-gray-700">{{ number_format($scan->weight, 2) }}g</td>
                            <td class="px-5 py-4 text-sm font-bold">
                                <span class="px-2.5 py-1 text-xs font-bold rounded-full bg-green-100 text-green-800">
                                    Grade {{ $scan->final_grade }}
                                </span>
                            </td>
                            <td class="px-5 py-4 text-sm text-gray-500">
                                {{ \Carbon\Carbon::createFromTimestampMs($scan->scan_timestamp)->format('M d, Y h:i A') }}
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="8" class="px-5 py-8 text-sm text-center text-gray-400">
                                No nut scans recorded yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
        @if($scans->hasPages())
            <div class="px-5 py-4 border-t border-gray-200">
                {{ $scans->links() }}
            </div>
        @endif
    </div>
</x-app-layout>
