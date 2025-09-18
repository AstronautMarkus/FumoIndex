<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\CharacterListController;
use App\Http\Controllers\Web\CharacterDetailController;
use App\Http\Controllers\Web\FumoTypesController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/characters', [CharacterListController::class, 'index'])->name('characters.list');
Route::get('/characters/{slug}', [CharacterDetailController::class, 'show'])->name('characters.detail');
Route::get('/what-is-a-fumo', function () { return view('what_is_a_fumo');})->name('what_is_a_fumo');
Route::get('/the-fumo-origins', function () { return view('fumo_origins');})->name('the_fumo_origins');
Route::get('/fumo-types', [FumoTypesController::class, 'index'])->name('fumo_types');
Route::get('/terms-and-conditions', function () { return view('terms_and_conditions');})->name('terms_and_conditions');