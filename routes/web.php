<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;

// Clear all existing routes
Route::get('/', function () {
    return redirect('/login');
});

// Authentication Routes
Route::controller(AuthController::class)->group(function() {
    // Show Registration Form
    Route::get('/register', 'showRegister')->name('register');
    
    // Handle Registration
    Route::post('/register', 'register');
    
    // Show Login Form
    Route::get('/login', 'showLogin')->name('login');
    
    // Handle Login
    Route::post('/login', 'login');
    
    // Handle Logout
    Route::post('/logout', 'logout')->name('logout');
});

// Protected Dashboard Route
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware('auth')->name('dashboard');