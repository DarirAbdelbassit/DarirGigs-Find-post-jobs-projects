<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

// Public route
Route::get('/', [ListingController::class, 'index'])->name('home');

// Authentication routes
Route::middleware('guest')->group(function () {
    // Registration
    Route::get('/register', [UserController::class, 'create'])->name('register.form');
    Route::post('/register', [UserController::class, 'store'])->name('register');

    // Login
    Route::get('/login', [UserController::class, 'login'])->name('login.form');
    Route::post('/login', [UserController::class, 'loginHandler'])->name('login');
});

// Authenticated routes
Route::middleware('auth')->group(function () {
    // Logout
    Route::post('/logout', [UserController::class, 'logout'])->name('logout');

    // Listings management
    Route::prefix('listings')->group(function () {
        Route::get('/create', [ListingController::class, 'create'])->name('listings.create');
        Route::post('/', [ListingController::class, 'store'])->name('listings.store');
        Route::get('/manage', [ListingController::class, 'manage'])->name('listings.manage');
        Route::get('/{id}', [ListingController::class, 'show'])->name('listings.show');
        Route::get('/{id}/edit', [ListingController::class, 'edit'])->name('listings.edit');
        Route::put('/{id}', [ListingController::class, 'update'])->name('listings.update');
        Route::delete('/{id}', [ListingController::class, 'destroy'])->name('listings.destroy');
    });
});
