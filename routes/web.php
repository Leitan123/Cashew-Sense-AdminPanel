<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LeafController;
use App\Http\Controllers\PestController;
use App\Http\Controllers\SoilScanController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return redirect()->route('login');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    
    Route::get('/customers', [CustomerController::class, 'index'])->name('customers.index');
    Route::get('/leafs', [LeafController::class, 'index'])->name('leafs.index');
    Route::get('/pests', [PestController::class, 'index'])->name('pests.index');
    Route::get('/soils', [SoilScanController::class, 'index'])->name('soils.index');
    // Admin view for Farm Owners
    Route::get('/farm-owners', [\App\Http\Controllers\FarmOwnerController::class, 'index'])->name('farm-owners.index');
    
    // Subscription Requests
    Route::get('/admin/subscription-requests', [\App\Http\Controllers\AdminSubscriptionRequestController::class, 'index'])->name('admin.subscription_requests.index');
    Route::post('/admin/subscription-requests/{id}/approve', [\App\Http\Controllers\AdminSubscriptionRequestController::class, 'approve'])->name('admin.subscription_requests.approve');
    Route::post('/admin/subscription-requests/{id}/reject', [\App\Http\Controllers\AdminSubscriptionRequestController::class, 'reject'])->name('admin.subscription_requests.reject');
});

Route::middleware('auth:farm_owner')->group(function () {
    Route::get('/farm-owner/dashboard', function () {
        return view('farm_owner.dashboard');
    })->name('farm_owner.dashboard');

    Route::get('/farm-owner/profile', [\App\Http\Controllers\FarmOwnerProfileController::class, 'edit'])->name('farm_owner.profile.edit');

    Route::get('/farm-owner/customers', [\App\Http\Controllers\FarmOwnerDataController::class, 'customers'])->name('farm_owner.customers');
    Route::get('/farm-owner/leaf-scans', [\App\Http\Controllers\FarmOwnerDataController::class, 'leafScans'])->name('farm_owner.leafs');
    Route::get('/farm-owner/pest-scans', [\App\Http\Controllers\FarmOwnerDataController::class, 'pestScans'])->name('farm_owner.pests');
    Route::get('/farm-owner/soil-scans', [\App\Http\Controllers\FarmOwnerDataController::class, 'soilScans'])->name('farm_owner.soils');
    Route::get('/farm-owner/subscription', [\App\Http\Controllers\FarmOwnerSubscriptionController::class, 'index'])->name('farm_owner.subscription');
    Route::post('/farm-owner/subscription/request', [\App\Http\Controllers\FarmOwnerSubscriptionController::class, 'requestUpgrade'])->name('farm_owner.subscription.request');
});


require __DIR__.'/auth.php';
