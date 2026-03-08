<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        try {
            $request->validate([
                'phone' => 'required|string',
                'pin_hash' => 'required|string',
            ]);

            $phone = $request->input('phone');
            $pinHash = $request->input('pin_hash');

            // 1. Find Customer
            $customer = Customer::where('phone', $phone)->first();

            if (!$customer) {
                return response()->json(['error' => 'User not found.'], 404);
            }

            // 2. Verify PIN
            if ($customer->pin_hash !== $pinHash) {
                return response()->json(['error' => 'Incorrect PIN.'], 401);
            }

            // 3. Fetch Leaf Scans
            $leafScans = DB::table('leaf_scans')
                ->where('customer_id', $customer->id)
                ->get()
                ->map(function ($scan) {
                    $url = $scan->image_url;
                    // If the url already starts with 'http', don't change it.
                    // Otherwise, prefix it with the app URL (which should be the live host on production)
                    if ($url && strpos($url, 'http') !== 0) {
                         // On Hostinger, the public folder is the root for web accessible files. 
                         // Our sync controller saves them as 'public/desease/' or 'public/pest/'.
                         // We need returning URLs to be fully qualified.
                         $url = url($url);
                    }
                    return [
                        'id' => $scan->id,
                        'timestamp' => $scan->scan_timestamp ?? strtotime($scan->created_at) * 1000,
                        'diseaseName' => $scan->disease_name,
                        'imagePath' => $url,
                    ];
                });

            // 4. Fetch Pest Scans
            $pestScans = DB::table('pest_scans')
                ->where('customer_id', $customer->id)
                ->get()
                ->map(function ($scan) {
                    $url = $scan->image_url;
                    if ($url && strpos($url, 'http') !== 0) {
                         $url = url($url);
                    }
                    return [
                        'id' => $scan->id,
                        'timestamp' => $scan->scan_timestamp ?? strtotime($scan->created_at) * 1000,
                        'pestName' => $scan->pest_name,
                        'imagePath' => $url,
                    ];
                });

            // 5. Fetch Soil Scans
            $soilScans = DB::table('soil_scans')
                ->where('customer_id', $customer->id)
                ->get()
                ->map(function ($scan) {
                    $url = $scan->image_url;
                    if ($url && strpos($url, 'http') !== 0) {
                         $url = url($url);
                    }
                    return [
                        'id' => $scan->id,
                        'timestamp' => $scan->scan_timestamp,
                        'moisture' => (float) $scan->moisture,
                        'temperature' => (float) $scan->temperature,
                        'ec' => (int) $scan->ec,
                        'ph' => (float) $scan->ph,
                        'nitrogen' => (int) $scan->nitrogen,
                        'phosphorus' => (int) $scan->phosphorus,
                        'potassium' => (int) $scan->potassium,
                        'soil_score' => (float) $scan->soil_score,
                        'imagePath' => $url,
                    ];
                });

            // Return user data and their history
            return response()->json([
                'message' => 'Login successful',
                'user' => [
                    'id' => $customer->id,
                    'name' => $customer->name,
                    'phone' => $customer->phone,
                    'district' => $customer->district,
                    'farm_size' => $customer->farm_size,
                    'synced' => 1,
                ],
                'leaf_scans' => $leafScans,
                'pest_scans' => $pestScans,
                'soil_scans' => $soilScans,
            ], 200);

        } catch (\Exception $e) {
            Log::error('API Login failed: ' . $e->getMessage());
            return response()->json(['error' => 'Login failed', 'details' => $e->getMessage()], 500);
        }
    }
}
