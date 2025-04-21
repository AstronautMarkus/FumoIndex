<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Characters\CharactersController;
use App\Http\Controllers\FumoTypes\FumoTypesController;

Route::get('/characters/franchise/{franchiseId}', [CharactersController::class, 'getCharactersByFranchise'])->name('characters.franchise');
Route::get('/fumo-types', [FumoTypesController::class, 'getFumoTypesList']);
Route::get('/fumo-types/{fumoTypeId}', [FumoTypesController::class, 'getFumoTypeById']);