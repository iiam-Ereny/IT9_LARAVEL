<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('login');
})->name('login'); // Ensure login page loads first

Route::post('/dashboard', function () { 
    return view('dashboard');
})->name('dashboard'); // POST request for login form submission

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard'); // Protect dashboard

Route::get('/inventory', function () {
    return view('inventory');
})->name('inventory');

Route::get('/sales', function () {
    return view('sales');
})->name('sales');

Route::get('/suppliers', function () {
    return view('suppliers');
})->name('suppliers');

Route::get('/reports', function () {
    return view('reports');
})->name('reports');

Route::get('/settings', function () {
    return view('settings');
})->name('settings');

Route::get('/logout', function () {
    return redirect('/');
})->name('logout');
