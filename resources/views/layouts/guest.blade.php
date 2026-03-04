<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name', 'CashewSense') }} - Admin</title>

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800;900&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        <style>
            body { font-family: 'Inter', sans-serif; }
            .auth-input {
                background: rgba(255,255,255,0.07);
                border: 1px solid rgba(255,255,255,0.12);
                color: #fff;
                border-radius: 10px;
                padding: 18px 16px 8px;
                width: 100%;
                font-size: 15px;
                outline: none;
                transition: border-color 0.2s, background 0.2s;
            }
            .auth-input:focus {
                border-color: #4ade80;
                background: rgba(74,222,128,0.07);
            }
            .auth-input::placeholder { color: transparent; }
            .auth-input:-webkit-autofill {
                -webkit-box-shadow: 0 0 0 100px #1a2e1a inset;
                -webkit-text-fill-color: #fff;
            }
            .input-wrapper { position: relative; }
            .input-label {
                position: absolute;
                top: 50%;
                left: 16px;
                transform: translateY(-50%);
                color: rgba(255,255,255,0.4);
                font-size: 14px;
                pointer-events: none;
                transition: all 0.2s ease;
            }
            .auth-input:focus ~ .input-label,
            .auth-input:not(:placeholder-shown) ~ .input-label {
                top: 10px;
                transform: none;
                font-size: 10px;
                color: #4ade80;
                font-weight: 500;
                letter-spacing: 0.05em;
                text-transform: uppercase;
            }
            .auth-btn-primary {
                background: #4ade80;
                color: #0d1f0d;
                border: none;
                border-radius: 50px;
                padding: 14px 36px;
                font-weight: 700;
                font-size: 14px;
                cursor: pointer;
                transition: background 0.2s, transform 0.1s;
                letter-spacing: 0.03em;
            }
            .auth-btn-primary:hover { background: #22c55e; transform: translateY(-1px); }
            .error-text { color: #f87171; font-size: 12px; margin-top: 4px; }
        </style>
    </head>
    <body class="antialiased">
        <!-- Full-page wrapper: background image covers the entire screen -->
        <div class="min-h-screen relative flex items-center"
             style="background-image: url('/images/cashew_bg.png'); background-size: cover; background-position: center; background-repeat: no-repeat;">

            <!-- Gradient overlay: solid dark green on the left, fading to transparent on the right -->
            <div class="absolute inset-0"
                 style="background: linear-gradient(to right, #0d1f0d 0%, #0d1f0d 38%, rgba(13,31,13,0.80) 52%, rgba(13,31,13,0.35) 68%, rgba(13,31,13,0.0) 100%);">
            </div>

            <!-- CashewSense Brand (top-left) -->
            <div class="absolute top-8 left-10 sm:left-16 flex items-center gap-2 z-10">
                <div class="w-8 h-8 rounded-full bg-[#4ade80] flex items-center justify-center shadow">
                    <svg class="w-5 h-5" viewBox="0 0 64 64" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <ellipse cx="32" cy="36" rx="20" ry="14" fill="#4f7942"/>
                        <ellipse cx="32" cy="34" rx="18" ry="12" fill="#c8a96e"/>
                        <path d="M32 22 Q44 12 50 20 Q56 28 44 32 Q36 28 32 22Z" fill="#a07840"/>
                        <ellipse cx="32" cy="34" rx="10" ry="6" fill="#f0d890" opacity="0.5"/>
                    </svg>
                </div>
                <span class="text-white font-bold text-lg tracking-wide">CashewSense<span class="text-[#4ade80]">.</span></span>
            </div>

            <!-- Form Content -->
            <div class="relative z-10 w-full max-w-md px-10 sm:px-16 py-20">
                {{ $slot }}
            </div>

            <!-- Bottom watermark (right side) -->
            <div class="absolute bottom-10 right-10 text-white opacity-20 z-10">
                <p class="text-3xl font-black tracking-widest">CS.</p>
            </div>
        </div>
    </body>
</html>
