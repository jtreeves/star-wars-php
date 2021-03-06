<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\MashupController;
use App\Http\Controllers\FavoriteController;
use App\Http\Controllers\FanController;
use App\Http\Controllers\ModeController;

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
    return view('home');
})->name('home');

Route::get('/about', function () {
    return view('about');
})->name('about');

Route::controller(ProfileController::class)->prefix('profiles')->name('profiles.')->group(function () {
    Route::post('/', 'store')->name('store');
    Route::get('/new', 'create')->name('create');
    Route::get('/{id}', 'show')->name('show');
    Route::get('/{id}/edit', 'edit')->name('edit');
    Route::put('/{id}', 'update')->name('update');
    Route::delete('/{id}', 'destroy')->name('destroy');
});

Route::controller(MashupController::class)->prefix('mashups')->name('mashups.')->group(function () {
    Route::get('/', 'index')->name('index');
    Route::get('/feed', 'feed')->name('feed');
    Route::get('/{id}', 'show')->name('show');
    Route::post('/', 'store')->name('store');
});

Route::controller(FavoriteController::class)->prefix('favorites')->name('favorites.')->group(function () {
    Route::get('/star/{mashupId}', 'star')->name('star');
    Route::get('/unstar/{mashupId}', 'unstar')->name('unstar');
});

Route::controller(FanController::class)->prefix('fans')->name('fans.')->group(function () {
    Route::get('/follow/{profileId}', 'follow')->name('follow');
    Route::get('/unfollow/{profileId}', 'unfollow')->name('unfollow');
});

Route::controller(ModeController::class)->prefix('mode')->name('mode.')->group(function () {
    Route::get('/light', 'light')->name('light');
    Route::get('/dark', 'dark')->name('dark');
});

require __DIR__.'/auth.php';
