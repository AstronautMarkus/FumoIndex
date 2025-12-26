<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\CharacterController;;
use App\Http\Controllers\Web\FumoTypeController;
use App\Http\Controllers\Web\FumoController;

use App\Http\Controllers\Auth\AuthController;

use App\Http\Controllers\Dashboard\DashboardController;
use App\Http\Controllers\Dashboard\CharactersController;
use App\Http\Controllers\Dashboard\FranchisesController;

use App\Http\Controllers\Imports\ImportExportController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/characters', [CharacterController::class, 'index'])->name('characters.list');
Route::get('/characters/{slug}', [CharacterController::class, 'show'])->name('characters.show');
Route::get('/what-is-a-fumo', function () { return view('what_is_a_fumo');})->name('what_is_a_fumo');
Route::get('/the-fumo-origins', function () { return view('fumo_origins');})->name('the_fumo_origins');
Route::get('/fumo-types', [FumoTypeController::class, 'index'])->name('fumo_types');
Route::get('/fumo-types/{slug_name}', [FumoTypeController::class, 'show'])->name('fumo_types.show');
Route::get('/terms-and-conditions', function () { return view('terms_and_conditions');})->name('terms_and_conditions');
Route::get('/fumos', [FumoController::class, 'index'])->name('fumos');

Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {
    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::get('/characters', [CharactersController::class, 'index'])->name('characters.index');
    Route::get('/characters/create', [CharactersController::class, 'create'])->name('characters.create');
    Route::post('/characters', [CharactersController::class, 'store'])->name('characters.store');
    Route::get('/characters/{character}', [CharactersController::class, 'show'])->name('characters.show');
    Route::get('/characters/{character}/edit', [CharactersController::class, 'edit'])->name('characters.edit');
    Route::put('/characters/{character}', [CharactersController::class, 'update'])->name('characters.update');
    Route::delete('/characters/{character}', [CharactersController::class, 'destroy'])->name('characters.destroy');

    Route::get('/franchises', [FranchisesController::class, 'index'])->name('franchises.index');
    Route::get('/franchises/create', [FranchisesController::class, 'create'])->name('franchises.create');
    Route::post('/franchises', [FranchisesController::class, 'store'])->name('franchises.store');
    Route::get('/franchises/{franchise}', [FranchisesController::class, 'show'])->name('franchises.show');
    Route::get('/franchises/{franchise}/edit', [FranchisesController::class, 'edit'])->name('franchises.edit');
    Route::put('/franchises/{franchise}', [FranchisesController::class, 'update'])->name('franchises.update');
    Route::delete('/franchises/{franchise}', [FranchisesController::class, 'destroy'])->name('franchises.destroy');

    Route::prefix('import-export')->name('import_export.')->group(function () {
        Route::get('/', [ImportExportController::class, 'importExportView'])->name('index');
        Route::get('/import/{type}', [ImportExportController::class, 'importView'])->name('import_view');
        Route::get('/export/{type}', [ImportExportController::class, 'exportView'])->name('export_view');
        Route::get('/export-data/{type}', [ImportExportController::class, 'exportData'])->name('export_data');
        Route::post('/import-data/{type}', [ImportExportController::class, 'importData'])->name('import_data');
    });
});

Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.form');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});