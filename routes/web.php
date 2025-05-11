<?php

use App\Http\Controllers\MedicineController;
use App\Models\Supplier;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;




Route::get('/', function () {
    return view('login');
})->name('login'); // Ensure login page loads first

// Route::post('/dashboard', function () { 
//     return view('dashboard');
// })->name('dashboard'); // POST request for login form submission

// Route::get('/dashboard', function () {
//     return view('profile.dashboard');
// })->middleware('auth')->name('dashboard'); // Protect dashboard

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

Route::get('/inventory', [MedicineController::class, 'index'])->name('medicine.index');
Route::post('/inventory', [MedicineController::class, 'store'])->name('medicine.store');

// I comment lang sa nako ni para walay error (Jeriel)
// Route::get('/reports', function () {
//     return view('reports');
// })->name('reports');

// Gi change nako ani para ma connect sa ReportController (Jeriel)
Route::get('/reports', [ReportController::class, 'index'])->name('reports.index');

Route::get('/settings', function () {
    return view('settings');
})->name('settings');

Route::get('/logout', function () {
    return redirect('/');
})->name('logout');
