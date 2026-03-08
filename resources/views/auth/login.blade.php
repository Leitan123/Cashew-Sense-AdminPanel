<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <!-- Page Heading -->
    <p class="text-[#4ade80] text-xs font-semibold tracking-widest uppercase mb-3">Welcome Back</p>
    <h1 class="text-white text-4xl sm:text-5xl font-black mb-2 leading-tight">
        Sign in to your<br>account<span class="text-[#4ade80]">.</span>
    </h1>
    <p class="text-gray-400 text-sm mb-8">
        Not a member?
        <a href="{{ route('register') }}" class="text-[#4ade80] font-semibold hover:underline">Create an account</a>
    </p>

    <form method="POST" action="{{ route('login') }}" class="space-y-4">
        @csrf

        <!-- Role Selection -->
        <div class="flex items-center gap-6 mb-2">
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="radio" name="role" value="admin" class="w-4 h-4 text-[#4ade80] bg-transparent border-gray-600 focus:ring-[#4ade80] focus:ring-2" checked>
                <span class="text-sm text-gray-300">Admin</span>
            </label>
            <label class="flex items-center gap-2 cursor-pointer">
                <input type="radio" name="role" value="farm_owner" class="w-4 h-4 text-[#4ade80] bg-transparent border-gray-600 focus:ring-[#4ade80] focus:ring-2" {{ old('role') == 'farm_owner' ? 'checked' : '' }}>
                <span class="text-sm text-gray-300">Farm Owner</span>
            </label>
        </div>
        @error('role')
            <div class="error-text">{{ $message }}</div>
        @enderror

        <!-- Email Address -->
        <div class="input-wrapper">
            <input
                id="email"
                type="email"
                name="email"
                value="{{ old('email') }}"
                required
                autofocus
                autocomplete="username"
                placeholder="email"
                class="auth-input"
            >
            <label for="email" class="input-label">Email address</label>
        </div>
        @error('email')
            <div class="error-text">{{ $message }}</div>
        @enderror

        <!-- Password -->
        <div class="input-wrapper">
            <input
                id="password"
                type="password"
                name="password"
                required
                autocomplete="current-password"
                placeholder="password"
                class="auth-input"
            >
            <label for="password" class="input-label">Password</label>
        </div>
        @error('password')
            <div class="error-text">{{ $message }}</div>
        @enderror

        <!-- Remember Me -->
        <div class="flex items-center justify-between pt-1">
            <label for="remember_me" class="flex items-center gap-2 cursor-pointer">
                <input id="remember_me" type="checkbox"
                    class="w-4 h-4 rounded border-gray-600 bg-transparent text-[#4ade80] focus:ring-[#4ade80]"
                    name="remember">
                <span class="text-sm text-gray-400">Remember me</span>
            </label>
            @if (Route::has('password.request'))
                <a href="{{ route('password.request') }}" class="text-sm text-[#4ade80] hover:underline">
                    Forgot password?
                </a>
            @endif
        </div>

        <!-- Submit -->
        <div class="flex gap-3 pt-4">
            <button type="submit" class="auth-btn-primary">
                Sign In
            </button>
        </div>
    </form>
</x-guest-layout>
