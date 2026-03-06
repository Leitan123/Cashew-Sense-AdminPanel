<?php

namespace App\Http\Controllers;

use App\Models\PestScan;
use Illuminate\Http\Request;

class PestController extends Controller
{
    public function index()
    {
        // Load pest scans with their corresponding customer data, ordered by newest descending
        $scans = PestScan::with('customer')->orderBy('scan_timestamp', 'desc')->paginate(15);
        
        return view('pests.index', compact('scans'));
    }
}
