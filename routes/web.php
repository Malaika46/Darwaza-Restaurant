<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DarwazaController;
use App\Http\Controllers\AdminController;

// Public Routes
Route::get('/', [DarwazaController::class, 'home']);
Route::get('/menu', [DarwazaController::class, 'menu']);
Route::get('/gallery', [DarwazaController::class, 'gallery']);
Route::get('/reservation', [DarwazaController::class, 'reservationForm']);
Route::post('/reservation', [DarwazaController::class, 'reservationStore']);
Route::get('/contact', [DarwazaController::class, 'contact']);
Route::post('/contact', [DarwazaController::class, 'contactStore']);

// Admin Routes (no auth for simplicity — add middleware if needed)
Route::prefix('admin')->group(function () {
    Route::get('/', [AdminController::class, 'dashboard']);
    Route::get('/reservations', [AdminController::class, 'reservations']);
    Route::get('/messages', [AdminController::class, 'messages']);
});
