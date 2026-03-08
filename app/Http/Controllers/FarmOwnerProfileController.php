<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\View\View;
use Illuminate\Support\Facades\Auth;

class FarmOwnerProfileController extends Controller
{
    /**
     * Display the farm owner's profile form.
     */
    public function edit(Request $request): View
    {
        return view('farm_owner.profile.edit', [
            'owner' => Auth::guard('farm_owner')->user(),
        ]);
    }
}
