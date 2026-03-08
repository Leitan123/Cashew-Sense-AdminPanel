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
});

Route::middleware('auth:farm_owner')->group(function () {
    Route::get('/farm-owner/dashboard', function () {
        return view('farm_owner.dashboard');
    })->name('farm_owner.dashboard');

    Route::get('/farm-owner/profile', [\App\Http\Controllers\FarmOwnerProfileController::class, 'edit'])->name('farm_owner.profile.edit');
});


require __DIR__.'/auth.php';
