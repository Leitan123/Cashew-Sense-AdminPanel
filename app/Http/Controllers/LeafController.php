<?php

namespace App\Http\Controllers;

use App\Models\LeafScan;
use Illuminate\Http\Request;

class LeafController extends Controller
{
    public function index()
    {
        // Load leaf scans with their corresponding customer data, ordered by newest descending
        $scans = LeafScan::with('customer')->orderBy('scan_timestamp', 'desc')->paginate(15);
        
        return view('leafs.index', compact('scans'));
    }
}
