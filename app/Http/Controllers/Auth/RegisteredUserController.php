<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules;
use Illuminate\View\View;

class RegisteredUserController extends Controller
{
    /**
     * Display the registration view.
     */
    public function create(): View
    {
        return view('auth.register');
    }

    /**
     * Handle an incoming registration request.
     *
     * @throws \Illuminate\Validation\ValidationException
     */
    public function store(Request $request): RedirectResponse
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'lowercase', 'email', 'max:255'],
            'password' => ['required', 'confirmed', Rules\Password::defaults()],
            'role' => ['required', 'in:admin,farm_owner'],
        ]);

        if ($request->role === 'farm_owner') {
            $request->validate([
                'email' => ['unique:'.\App\Models\FarmOwner::class],
            ]);

            $farmOwner = \App\Models\FarmOwner::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
                'unique_code' => 'FO-' . strtoupper(\Illuminate\Support\Str::random(6)),
            ]);

            event(new Registered($farmOwner));

            Auth::guard('farm_owner')->login($farmOwner);

            return redirect()->route('farm_owner.dashboard');
        } else {
            $request->validate([
                'email' => ['unique:'.User::class],
            ]);

            $user = User::create([
                'name' => $request->name,
                'email' => $request->email,
                'password' => Hash::make($request->password),
            ]);

            event(new Registered($user));

            Auth::login($user);

            return redirect(route('dashboard', absolute: false));
        }
    }
}
