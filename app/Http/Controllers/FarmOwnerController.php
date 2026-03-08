<?php

namespace App\Http\Controllers;

use App\Models\FarmOwner;
use Illuminate\Http\Request;
use Illuminate\View\View;

class FarmOwnerController extends Controller
{
    /**
     * Display a listing of the farm owners for admins.
     */
    public function index(): View
    {
        $farmOwners = FarmOwner::latest()->paginate(10);
        return view('farm-owners.index', compact('farmOwners'));
    }
}
