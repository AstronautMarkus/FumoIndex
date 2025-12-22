<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\CharacterController;;
use App\Http\Controllers\Web\FumoTypeController;
use App\Http\Controllers\Web\FumoController;
use App\Http\Controllers\Auth\AuthController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/characters', [CharacterController::class, 'index'])->name('characters.list');
Route::get('/characters/{slug}', [CharacterController::class, 'show'])->name('characters.show');
Route::get('/what-is-a-fumo', function () { return view('what_is_a_fumo');})->name('what_is_a_fumo');
Route::get('/the-fumo-origins', function () { return view('fumo_origins');})->name('the_fumo_origins');
Route::get('/fumo-types', [FumoTypeController::class, 'index'])->name('fumo_types');
Route::get('/fumo-types/{slug_name}', [FumoTypeController::class, 'show'])->name('fumo_types.show');
Route::get('/terms-and-conditions', function () { return view('terms_and_conditions');})->name('terms_and_conditions');
Route::get('/fumos', [FumoController::class, 'index'])->name('fumos');

Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.form');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});