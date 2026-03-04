@props(['disabled' => false])

<input @disabled($disabled) {{ $attributes->merge(['class' => 'border-gray-300 focus:border-[#4f7942] focus:ring-[#4f7942] rounded-md shadow-sm']) }}>
