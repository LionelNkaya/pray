<?php

use App\Http\Controllers\PrayerController;
use App\Http\Controllers\ProfileController;
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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [PrayerController::class, 'index'])->name('home');
Route::resource('prayers', PrayerController::class);

Route::get('/profile', [ProfileController::class, 'showProfileModal'])->name('profile');