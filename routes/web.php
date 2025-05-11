<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\MedicineController;
use App\Http\Controllers\SalesController;
use App\Models\Supplier;
use App\Models\Medicine;
use Illuminate\Support\Carbon;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('login');  // Show login form
})->name('login');



// Post request for login action
Route::post('/login', [DashboardController::class, 'login'])->name('login.post');

// Protected dashboard route (check if user is set in session)
Route::get('/dashboard', [DashboardController::class, 'index'])

    ->name('dashboard');

// Logout route
Route::post('/logout', [DashboardController::class, 'logout'])->name('logout');
// Sales routes
Route::prefix('sales')->group(function () {
    Route::get('/', [SalesController::class, 'index'])->name('sales.index');
    Route::post('/', [SalesController::class, 'store'])->name('sales.store');
    Route::delete('/{id}', [SalesController::class, 'destroy'])->name('sales.destroy');
    Route::get('/{id}/edit', [SalesController::class, 'edit'])->name('sales.edit');
    Route::put('/{id}', [SalesController::class, 'update'])->name('sales.update');
});

// Supplier routes
Route::prefix('suppliers')->group(function () {
    Route::get('/', [SupplierController::class, 'index'])->name('suppliers');
    Route::post('/', [SupplierController::class, 'store'])->name('suppliers.store');
    Route::put('/{id}', [SupplierController::class, 'update'])->name('suppliers.update');
    Route::delete('/{id}', [SupplierController::class, 'destroy'])->name('suppliers.destroy');
    Route::get('/{id}/edit', [SupplierController::class, 'edit'])->name('suppliers.edit');
});

// Medicine/Inventory routes
Route::prefix('medicine')->group(function () {
    Route::get('/inventory', [MedicineController::class, 'index'])->name('medicine.index');
    Route::post('/inventory', [MedicineController::class, 'store'])->name('medicine.store');
    Route::get('/{id}/edit', [MedicineController::class, 'edit'])->name('medicine.edit');
    Route::put('/{id}', [MedicineController::class, 'update'])->name('medicine.update');
    Route::delete('/{id}', [MedicineController::class, 'destroy'])->name('medicine.destroy');
});

Route::get('/reports', function () {
    return view('reports');
})->name('reports');

Route::get('/settings', function () {
    return view('settings');
})->name('settings');