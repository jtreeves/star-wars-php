<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MashupController;
use App\Http\Controllers\FavoriteController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

Route::controller(ProfileController::class)->prefix('profiles')->group(function () {
    Route::post('/', 'store');
    Route::get('/{id}', 'show');
    Route::get('/{id}/edit', 'edit');
    Route::put('/{id}', 'update');
    Route::delete('/{id}', 'destroy');
});

Route::controller(MashupController::class)->prefix('mashups')->group(function () {
    Route::get('/', 'index');
    Route::post('/', 'store');
});

Route::controller(FavoriteController::class)->prefix('favorites')->group(function () {
    Route::post('/{profileId}/{mashupId}', 'store');
    Route::delete('/{id}', 'destroy');
});

require __DIR__.'/auth.php';
