<?php

use App\Http\Controllers\CashAccountController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\SupplierController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CashMovementController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::middleware(['auth'])->group(function () {
    Route::resource('cash-accounts', CashAccountController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('suppliers', SupplierController::class);
});

Route::middleware(['auth'])->group(function () {
    Route::resource('cash-accounts', CashAccountController::class);
    Route::resource('cash-movements', CashMovementController::class);
    Route::resource('clients', ClientController::class);
    Route::resource('suppliers', SupplierController::class);
});

require __DIR__.'/auth.php';
