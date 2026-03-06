<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\LeafScan;
use App\Models\PestScan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class SyncController extends Controller
{
    public function sync(Request $request)
    {
        try {
            DB::beginTransaction();

            $data = $request->all();

            // 1. Process Users (Customers)
            if (isset($data['users']) && is_array($data['users'])) {
                foreach ($data['users'] as $userData) {
                    Customer::updateOrCreate(
                        ['phone' => $userData['phone']], // unique identifier
                        [
                            'name' => $userData['name'],
                            'pin_hash' => $userData['pin_hash'],
                            'district' => $userData['district'],
                            'farm_size' => $userData['farm_size'],
                        ]
                    );
                }
            }

            // 2. Process Leaf Scans
            if (isset($data['leaf_scans']) && is_array($data['leaf_scans'])) {
                foreach ($data['leaf_scans'] as $scan) {
                    // Must find the customer by phone to get the cloud ID
                    $customer = Customer::where('phone', $scan['user_phone'])->first();
                    if ($customer) {
                        // Check if this specific scan already exists to prevent duplicates
                        LeafScan::firstOrCreate([
                            'customer_id' => $customer->id,
                            'scan_timestamp' => $scan['timestamp'],
                            'disease_name' => $scan['diseaseName'],
                        ], [
                            'image_url' => $scan['imagePath'] ?? 'placeholder', // In a real app we'd upload the file
                        ]);
                    }
                }
            }

            // 3. Process Pest Scans
            if (isset($data['pest_scans']) && is_array($data['pest_scans'])) {
                foreach ($data['pest_scans'] as $scan) {
                    $customer = Customer::where('phone', $scan['user_phone'])->first();
                    if ($customer) {
                        PestScan::firstOrCreate([
                            'customer_id' => $customer->id,
                            'scan_timestamp' => $scan['timestamp'],
                            'pest_name' => $scan['pestName'],
                        ], [
                            'image_url' => $scan['imagePath'] ?? 'placeholder',
                        ]);
                    }
                }
            }

            DB::commit();
            return response()->json(['message' => 'Sync successful'], 200);

        } catch (\Exception $e) {
            DB::rollBack();
            Log::error('Sync failed: ' . $e->getMessage());
            return response()->json(['error' => 'Sync failed', 'details' => $e->getMessage()], 500);
        }
    }
}
