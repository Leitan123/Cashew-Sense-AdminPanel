<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\LeafScan;
use App\Models\PestScan;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Schema;

class SyncController extends Controller
{
    public function sync(Request $request)
    {
        try {
            DB::beginTransaction();

            $data = $request->all();

            // 1. Process Users (Customers)
            if (isset($data['users']) && is_array($data['users'])) {
                // Check once if the employee_code column exists (in case migration hasn't run on live yet)
                $hasEmployeeCode = Schema::hasColumn('customers', 'employee_code');

                foreach ($data['users'] as $userData) {
                    $existing = DB::table('customers')->where('phone', $userData['phone'])->first();
                    
                    $updateData = [
                        'name' => $userData['name'],
                        'pin_hash' => $userData['pin_hash'],
                        'district' => $userData['district'],
                        'farm_size' => $userData['farm_size'],
                    ];
                    
                    if ($hasEmployeeCode && isset($userData['employee_code'])) {
                        $targetCode = $userData['employee_code'];
                        
                        // Check if this is a NEW link to this farm owner
                        $isAlreadyLinked = $existing && $existing->employee_code === $targetCode;
                        
                        if (!$isAlreadyLinked) {
                            $farmOwner = \App\Models\FarmOwner::where('unique_code', $targetCode)->first();
                            if ($farmOwner && $farmOwner->hasReachedLimit()) {
                                Log::warning("Limit reached for Farm Owner {$targetCode}. Cannot add customer {$userData['phone']}.");
                                continue; // Skip this user
                            }
                        }
                        
                        $updateData['employee_code'] = $targetCode;
                    }

                    if ($existing) {
                        DB::table('customers')->where('phone', $userData['phone'])->update($updateData);
                    } else {
                        $insertData = array_merge($updateData, [
                            'phone' => $userData['phone'],
                            'created_at' => now(),
                        ]);
                        DB::table('customers')->insert($insertData);
                    }
                }
            }

            // 2. Process Leaf Scans
            if (isset($data['leaf_scans']) && is_array($data['leaf_scans'])) {
                foreach ($data['leaf_scans'] as $scan) {
                    // Must find the customer by phone to get the cloud ID
                    $customer = Customer::where('phone', $scan['user_phone'])->first();
                    if ($customer) {
                        $exists = DB::table('leaf_scans')
                            ->where('customer_id', $customer->id)
                            ->where('scan_timestamp', $scan['timestamp'])
                            ->where('disease_name', $scan['diseaseName'])
                            ->exists();
                            
                        $imageUrl = $scan['imagePath'] ?? 'placeholder';
                        if (!empty($scan['imageBase64'])) {
                            $imageData = base64_decode($scan['imageBase64']);
                            $fileName = 'leaf_' . time() . '_' . uniqid() . '.jpg';
                            
                            $dir = public_path('desease'); // matching user's exact folder name requirement
                            if (!file_exists($dir)) {
                                mkdir($dir, 0777, true);
                            }
                            
                            file_put_contents($dir . '/' . $fileName, $imageData);
                            $imageUrl = 'public/desease/' . $fileName;
                        }

                        if (!$exists) {
                            DB::table('leaf_scans')->insert([
                                'customer_id' => $customer->id,
                                'scan_timestamp' => $scan['timestamp'],
                                'disease_name' => $scan['diseaseName'],
                                'image_url' => $imageUrl,
                                'created_at' => now(), // The live schema only has created_at
                            ]);
                        }
                    }
                }
            }

            // 3. Process Pest Scans
            if (isset($data['pest_scans']) && is_array($data['pest_scans'])) {
                foreach ($data['pest_scans'] as $scan) {
                    $customer = Customer::where('phone', $scan['user_phone'])->first();
                    if ($customer) {
                        $exists = DB::table('pest_scans')
                            ->where('customer_id', $customer->id)
                            ->where('scan_timestamp', $scan['timestamp'])
                            ->where('pest_name', $scan['pestName'])
                            ->exists();
                            
                        $imageUrl = $scan['imagePath'] ?? 'placeholder';
                        if (!empty($scan['imageBase64'])) {
                            $imageData = base64_decode($scan['imageBase64']);
                            $fileName = 'pest_' . time() . '_' . uniqid() . '.jpg';
                            
                            $dir = public_path('pest');
                            if (!file_exists($dir)) {
                                mkdir($dir, 0777, true);
                            }
                            
                            file_put_contents($dir . '/' . $fileName, $imageData);
                            $imageUrl = 'public/pest/' . $fileName;
                        }

                        if (!$exists) {
                            DB::table('pest_scans')->insert([
                                'customer_id' => $customer->id,
                                'scan_timestamp' => $scan['timestamp'],
                                'pest_name' => $scan['pestName'],
                                'image_url' => $imageUrl,
                                'created_at' => now(), // The live schema only has created_at
                            ]);
                        }
                    }
                }
            }

            // 4. Process Soil Scans
            if (isset($data['soil_scans']) && is_array($data['soil_scans'])) {
                foreach ($data['soil_scans'] as $scan) {
                    $customer = Customer::where('phone', $scan['user_phone'])->first();
                    if ($customer) {
                        $exists = DB::table('soil_scans')
                            ->where('customer_id', $customer->id)
                            ->where('scan_timestamp', $scan['timestamp'])
                            ->exists();

                        $imageUrl = $scan['imagePath'] ?? 'placeholder';
                        if (!empty($scan['imageBase64'])) {
                            $imageData = base64_decode($scan['imageBase64']);
                            $fileName = 'soil_' . time() . '_' . uniqid() . '.jpg';
                            
                            $dir = public_path('soil');
                            if (!file_exists($dir)) {
                                mkdir($dir, 0777, true);
                            }
                            
                            file_put_contents($dir . '/' . $fileName, $imageData);
                            $imageUrl = 'public/soil/' . $fileName;
                        }

                        if (!$exists) {
                            DB::table('soil_scans')->insert([
                                'customer_id' => $customer->id,
                                'scan_timestamp' => $scan['timestamp'],
                                'moisture' => $scan['moisture'] ?? null,
                                'temperature' => $scan['temperature'] ?? null,
                                'ec' => $scan['ec'] ?? null,
                                'ph' => $scan['ph'] ?? null,
                                'nitrogen' => $scan['nitrogen'] ?? null,
                                'phosphorus' => $scan['phosphorus'] ?? null,
                                'potassium' => $scan['potassium'] ?? null,
                                'soil_score' => $scan['soil_score'] ?? null,
                                'image_url' => $imageUrl,
                                'created_at' => now(),
                                'updated_at' => now(),
                            ]);
                        }
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
