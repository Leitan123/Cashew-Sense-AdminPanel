@props(['active'])

@php
$classes = ($active ?? false)
            ? 'flex items-center w-full px-3 py-2.5 text-sm font-medium text-white bg-[#3b5b31] rounded-lg transition duration-150 ease-in-out'
            : 'flex items-center w-full px-3 py-2.5 text-sm font-medium text-gray-200 hover:text-white hover:bg-[#3b5b31] rounded-lg transition duration-150 ease-in-out';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
