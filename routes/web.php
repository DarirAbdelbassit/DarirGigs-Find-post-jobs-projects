<?php

use Illuminate\Support\Facades\Route;

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

Route::get('/', function () {
    return view('listings.index', [
        'listings' => App\Models\Listing::all()
    ]);
});
Route::get('/listings/{id}', function ($id) {
    if (!App\Models\Listing::find($id)) {
        abort(404);
    }
    return view('listings.listing', [
        'listing' => App\Models\Listing::find($id)
    ]);
});
