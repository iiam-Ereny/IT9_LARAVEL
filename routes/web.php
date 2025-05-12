<?php

use App\Http\Controllers\MedicineController;
use App\Models\Supplier;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
})->name('login'); // Ensure login page loads first

Route::post('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');

Route::get('/sales', function () {
    return view('sales');
})->name('sales');

Route::get('/suppliers', [SupplierController::class, 'index'])->name('suppliers');
Route::post('/suppliers', [SupplierController::class, 'store'])->name('suppliers.store');

// Existing inventory routes
Route::get('/inventory', [MedicineController::class, 'index'])->name('medicine.index');
Route::post('/inventory', [MedicineController::class, 'store'])->name('medicine.store');

// ✅ Added alias route to match 'medicines.index'
Route::get('/medicines', [MedicineController::class, 'index'])->name('medicines.index');

Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');
Route::get('/reports/download', [ReportController::class, 'downloadPDF'])->name('reports.download');

Route::get('/settings', function () {
    return view('settings');
})->name('settings');

Route::get('/logout', function () {
    return redirect('/');
})->name('logout');

