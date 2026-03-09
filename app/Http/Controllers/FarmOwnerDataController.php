<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\LeafScan;
use App\Models\PestScan;
use App\Models\SoilScan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class FarmOwnerDataController extends Controller
{
    /**
     * Get the currently authenticated farm owner's unique code.
     */
    protected function ownerCode(): string
    {
        return Auth::guard('farm_owner')->user()->unique_code;
    }

    /**
     * Show customers that belong to this farm owner.
     */
    public function customers()
    {
        $customers = Customer::withCount(['leafScans', 'pestScans'])
            ->where('employee_code', $this->ownerCode())
            ->latest()
            ->paginate(10);

        return view('farm_owner.customers.index', compact('customers'));
    }

    /**
     * Show leaf scans for this farm owner's customers.
     */
    public function leafScans()
    {
        $ownerCode = $this->ownerCode();

        $scans = LeafScan::with('customer')
            ->whereHas('customer', fn($q) => $q->where('employee_code', $ownerCode))
            ->orderBy('scan_timestamp', 'desc')
            ->paginate(15);

        return view('farm_owner.leafs.index', compact('scans'));
    }

    /**
     * Show pest scans for this farm owner's customers.
     */
    public function pestScans()
    {
        $ownerCode = $this->ownerCode();

        $scans = PestScan::with('customer')
            ->whereHas('customer', fn($q) => $q->where('employee_code', $ownerCode))
            ->orderBy('scan_timestamp', 'desc')
            ->paginate(15);

        return view('farm_owner.pests.index', compact('scans'));
    }

    /**
     * Show soil scans for this farm owner's customers.
     */
    public function soilScans()
    {
        $ownerCode = $this->ownerCode();

        $scans = SoilScan::with('customer')
            ->whereHas('customer', fn($q) => $q->where('employee_code', $ownerCode))
            ->orderBy('scan_timestamp', 'desc')
            ->paginate(15);

        return view('farm_owner.soils.index', compact('scans'));
    }
}
