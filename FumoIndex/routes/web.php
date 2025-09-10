<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\Web\HomeController;
use App\Http\Controllers\Web\CharacterListController;

Route::get('/', [HomeController::class, 'index'])->name('home');
Route::get('/characters', [CharacterListController::class, 'index'])->name('characters.list');
