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
Route::get('/listings/create', [ ListingController::class,'create']);
// to store a single listing
Route::post('/listings', [ListingController::class,'store']);
// to display a single listing
Route::get('/listings/{id}', [ ListingController::class,'show']);
// to display edit form
Route::get('/listings/{id}/edit', [ ListingController::class,'edit']);
// to update a single listing
Route::put('/listings/{id}', [ ListingController::class,'update']);
// to delete a single listing
Route::delete('/listings/{id}', [ ListingController::class,'destroy']);
// to display register form
Route::get('/register', [UserController::class,'create']);
