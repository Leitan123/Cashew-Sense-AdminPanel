<button {{ $attributes->merge(['type' => 'submit', 'class' => 'inline-flex items-center px-4 py-2 bg-[#4f7942] border border-transparent rounded-md font-semibold text-xs text-white uppercase tracking-widest hover:bg-[#3b5b31] focus:bg-[#3b5b31] active:bg-[#2c3e2d] focus:outline-none focus:ring-2 focus:ring-[#4f7942] focus:ring-offset-2 transition ease-in-out duration-150']) }}>
    {{ $slot }}
</button>
