<x-guest-layout>
    <!-- Page Heading -->
    <p class="text-[#4ade80] text-xs font-semibold tracking-widest uppercase mb-3">Start for free</p>
    <h1 class="text-white text-4xl sm:text-5xl font-black mb-2 leading-tight">
        Create new<br>account<span class="text-[#4ade80]">.</span>
    </h1>
    <p class="text-gray-400 text-sm mb-8">
        Already a member?
        <a href="{{ route('login') }}" class="text-[#4ade80] font-semibold hover:underline">Log In</a>
    </p>

    <form method="POST" action="{{ route('register') }}" class="space-y-4">
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

        <!-- Name -->
        <div class="input-wrapper">
            <input
                id="name"
                type="text"
                name="name"
                value="{{ old('name') }}"
                required
                autofocus
                autocomplete="name"
                placeholder="name"
                class="auth-input"
            >
            <label for="name" class="input-label">Full name</label>
        </div>
        @error('name')
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
                autocomplete="new-password"
                placeholder="password"
                class="auth-input"
            >
            <label for="password" class="input-label">Password</label>
        </div>
        @error('password')
            <div class="error-text">{{ $message }}</div>
        @enderror

        <!-- Confirm Password -->
        <div class="input-wrapper">
            <input
                id="password_confirmation"
                type="password"
                name="password_confirmation"
                required
                autocomplete="new-password"
                placeholder="confirm"
                class="auth-input"
            >
            <label for="password_confirmation" class="input-label">Confirm password</label>
        </div>
        @error('password_confirmation')
            <div class="error-text">{{ $message }}</div>
        @enderror

        <!-- Submit -->
        <div class="flex gap-3 pt-4">
            <button type="submit" class="auth-btn-primary">
                Create account
            </button>
        </div>
    </form>
</x-guest-layout>
