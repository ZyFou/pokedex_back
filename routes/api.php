<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix' => 'pokemon'], function () {
    Route::get('/', [PokemonController::class, 'index']);
    Route::get('/{pokemon}', [PokemonController::class, 'show']);
    Route::get('/{pokemon}/varieties', [PokemonController::class, 'showVarieties']);

    Route::get('/{pokemon}/stats', [PokemonController::class, 'stats']);
    // Route::get('/{pokemon}/moves', [PokemonController::class, 'showMoves']);


    // Route::get('/{pokemon}/evolutions', [PokemonController::class, 'showEvolutions']);
});