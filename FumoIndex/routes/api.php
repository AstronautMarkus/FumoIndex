<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Characters\CharactersController;

Route::get('/test', function () {
    return response()->json(['message' => 'It works']);
});

Route::get('/characters', [CharactersController::class, 'getCharactersList']);
Route::get('/characters/franchise/{franchiseId}', [CharactersController::class, 'getCharactersByFranchise']);
