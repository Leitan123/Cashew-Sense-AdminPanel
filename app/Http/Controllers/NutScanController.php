<?php

namespace App\Http\Controllers;

use App\Models\NutScan;
use Illuminate\Http\Request;

class NutScanController extends Controller
{
    public function index()
    {
        // Load nut scans with their corresponding customer data, ordered by newest descending
        $scans = NutScan::with('customer')->orderBy('scan_timestamp', 'desc')->paginate(15);
        
        return view('nuts.index', compact('scans'));
    }
}
