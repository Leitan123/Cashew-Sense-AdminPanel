<?php

namespace App\Http\Controllers;

use App\Models\SoilScan;
use Illuminate\Http\Request;

class SoilScanController extends Controller
{
    public function index()
    {
        // Load soil scans with their corresponding customer data, ordered by newest descending
        $scans = SoilScan::with('customer')->orderBy('scan_timestamp', 'desc')->paginate(15);
        
        return view('soils.index', compact('scans'));
    }
}
