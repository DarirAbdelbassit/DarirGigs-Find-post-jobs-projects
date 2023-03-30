<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ListingController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
// to get all listings from database
Route::get('/', [ListingController::class,'index']);
// to display create form
Route::get('/listings/create', [ ListingController::class,'create'])->middleware('auth');
// to store a single listing
Route::post('/listings', [ListingController::class,'store'])->middleware('auth');
// to display manage listings page
Route::get('/listings/mange', [ ListingController::class,'manage'])->middleware('auth');
// to display a single listing
Route::get('/listings/{id}', [ ListingController::class,'show'])->middleware('auth');
// to display edit form
Route::get('/listings/{id}/edit', [ ListingController::class,'edit'])->middleware('auth');
// to update a single listing
Route::put('/listings/{id}', [ ListingController::class,'update'])->middleware('auth');
// to delete a single listing
Route::delete('/listings/{id}', [ ListingController::class,'destroy'])->middleware('auth');
// to display register form
Route::get('/register', [UserController::class,'create'])->middleware('guest');
// to store a single user
Route::post('/register', [UserController::class,'store'])->middleware('guest');
// to logout
Route::post('/logout', [UserController::class,'logout'])->middleware('auth');
// to display login form
Route::get('/login', [UserController::class,'login'])->name('login')->middleware('guest');
// to check login info
Route::post('/login', [UserController::class,'loginHandler'])->middleware('guest');

