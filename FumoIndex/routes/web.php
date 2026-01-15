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
use App\Http\Controllers\Dashboard\FumoTypesController;
use App\Http\Controllers\Dashboard\FumosController;
use App\Http\Controllers\Dashboard\ProfileController;
use App\Http\Controllers\Dashboard\UsersController;

use App\Http\Controllers\Imports\ImportExportController;
use App\Http\Controllers\Utils\CharacterAndFranchisesController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/characters', [CharacterController::class, 'index'])->name('characters.list');
Route::get('/characters/{slug}', [CharacterController::class, 'show'])->name('characters.show');
Route::get('/what-is-a-fumo', function () { return view('what_is_a_fumo');})->name('what_is_a_fumo');
Route::get('/the-fumo-origins', function () { return view('fumo_origins');})->name('the_fumo_origins');
Route::get('/fumo-types', [FumoTypeController::class, 'index'])->name('fumo_types');
Route::get('/fumo-types/{slug_name}', [FumoTypeController::class, 'show'])->name('fumo_types.show');
Route::get('/terms-and-conditions', function () { return view('terms_and_conditions');})->name('terms_and_conditions');
Route::get('/fumos', [FumoController::class, 'index'])->name('fumos');
Route::get('/fumos/{gift_code}', [FumoController::class, 'show'])->name('fumos.show');

Route::get('/profile', [ProfileController::class, 'index'])->name('dashboard.profile')->middleware('auth');
Route::get('/profile/edit', [ProfileController::class, 'edit'])->name('profile.edit')->middleware('auth');
Route::put('/profile/update', [ProfileController::class, 'update'])->name('profile.update')->middleware('auth');

Route::prefix('dashboard')->name('dashboard.')->middleware('auth')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name('index');
    Route::get('/characters', [CharactersController::class, 'index'])->name('characters.index');
    Route::get('/characters/create', [CharactersController::class, 'create'])->name('characters.create');
    Route::post('/characters', [CharactersController::class, 'store'])->name('characters.store');
    Route::get('/characters/{character}', [CharactersController::class, 'show'])->name('characters.show');
    Route::get('/characters/{character}/edit', [CharactersController::class, 'edit'])->name('characters.edit');
    Route::put('/characters/{character}', [CharactersController::class, 'update'])->name('characters.update');
    Route::delete('/characters/{character}', [CharactersController::class, 'destroy'])->name('characters.destroy');

    Route::get('/fumo-types', [FumoTypesController::class, 'index'])->name('fumo_types.index');
    Route::get('/fumo-types/create', [FumoTypesController::class, 'create'])->name('fumo_types.create');
    Route::post('/fumo-types', [FumoTypesController::class, 'store'])->name('fumo_types.store');
    Route::get('/fumo-types/{fumoType}', [FumoTypesController::class, 'show'])->name('fumo_types.show');
    Route::get('/fumo-types/{fumoType}/edit', [FumoTypesController::class, 'edit'])->name('fumo_types.edit');
    Route::put('/fumo-types/{fumoType}', [FumoTypesController::class, 'update'])->name('fumo_types.update');
    Route::delete('/fumo-types/{fumoType}', [FumoTypesController::class, 'destroy'])->name('fumo_types.destroy');

    Route::get('/franchises', [FranchisesController::class, 'index'])->name('franchises.index');
    Route::get('/franchises/create', [FranchisesController::class, 'create'])->name('franchises.create');
    Route::post('/franchises', [FranchisesController::class, 'store'])->name('franchises.store');
    Route::get('/franchises/{franchise}', [FranchisesController::class, 'show'])->name('franchises.show');
    Route::get('/franchises/{franchise}/edit', [FranchisesController::class, 'edit'])->name('franchises.edit');
    Route::put('/franchises/{franchise}', [FranchisesController::class, 'update'])->name('franchises.update');
    Route::delete('/franchises/{franchise}', [FranchisesController::class, 'destroy'])->name('franchises.destroy');

    Route::get('/fumos', [FumosController::class, 'index'])->name('fumos.index');
    Route::get('/fumos/create', [FumosController::class, 'create'])->name('fumos.create');
    Route::post('/fumos', [FumosController::class, 'store'])->name('fumos.store');
    Route::get('/fumos/{fumo}', [FumosController::class, 'show'])->name('fumos.show');
    Route::get('/fumos/{fumo}/edit', [FumosController::class, 'edit'])->name('fumos.edit');
    Route::put('/fumos/{fumo}', [FumosController::class, 'update'])->name('fumos.update');
    Route::delete('/fumos/{fumo}', [FumosController::class, 'destroy'])->name('fumos.destroy');

    Route::get('/users', [UsersController::class, 'index'])->name('users.index');
    Route::get('/users/{id}', [UsersController::class, 'show'])->name('users.show');

    Route::prefix('import-export')->name('import_export.')->group(function () {
        Route::get('/', [ImportExportController::class, 'importExportView'])->name('index');
        Route::get('/import/{type}', [ImportExportController::class, 'importView'])->name('import_view');
        Route::get('/export/{type}', [ImportExportController::class, 'exportView'])->name('export_view');
        Route::get('/export-data/{type}', [ImportExportController::class, 'exportData'])->name('export_data');
        Route::post('/import-data/{type}', [ImportExportController::class, 'importData'])->name('import_data');
    });

    Route::prefix('utils')->name('utils.')->group(function () {
        Route::get('/franchises', [CharacterAndFranchisesController::class, 'franchises'])->name('franchises');
        Route::get('/characters/{franchise_slug}', [CharacterAndFranchisesController::class, 'characters'])->name('characters');
    });


});

Route::prefix('auth')->name('auth.')->group(function () {
    Route::get('/login', [AuthController::class, 'showLoginForm'])->name('login.form');
    Route::post('/login', [AuthController::class, 'login'])->name('login');
    Route::post('/logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('/register', [AuthController::class, 'showRegistrationForm'])->name('register.form');
    Route::post('/register', [AuthController::class, 'register'])->name('register');
});
