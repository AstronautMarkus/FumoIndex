<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Characters\CharactersController;
use App\Http\Controllers\FumoTypes\FumoTypesController;
use App\Http\Controllers\Franchises\FranchisesController;
use App\Http\Controllers\Fumo\GetFumosController;
use App\Http\Controllers\Fumo\FumoDetails;

Route::get('/characters/franchise/{franchiseId}', [CharactersController::class, 'getCharactersByFranchise']);
Route::get('/franchises', [FranchisesController::class, 'getFranchises']);
Route::get('/fumo-types', [FumoTypesController::class, 'getFumoTypesList']);
Route::get('/fumo', [GetFumosController::class, 'GetFumos']);
Route::get('/fumo/{fumoId}', [FumoDetails::class, 'getFumoDetails']);