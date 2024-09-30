<?php

use App\Http\Controllers\AbilityController;
use App\Http\Controllers\MoveController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PokemonController;
use App\Http\Controllers\TypeController;
use App\Models\Ability;

Route::get('/user', action: function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::group(['prefix' => 'pokemon'], function () {
    Route::get('/', [PokemonController::class, 'index']);
    Route::get('/{pokemon}', [PokemonController::class, 'show']);
    Route::get('/{pokemon}/varieties', [PokemonController::class, 'showVarieties']);

    Route::get('/{pokemon}/stats', [PokemonController::class, 'stats']);
    Route::get('/{pokemon}/moves', [PokemonController::class, 'Moves']);

    Route::get('/{pokemon}/evolution', [PokemonController::class, 'evolutions']);
    Route::get('/{pokemon}/chain', [PokemonController::class, 'chain']);
});


Route::group(['prefix' => 'type'], function () {
    Route::get('/', [TypeController::class, 'index']);
    Route::get(
        '{typeId}/infos',
        [TypeController::class, 'infos']
    );

    Route::get(
        '{typeId}/weakness',
        [TypeController::class, 'weaknesses']
    );
    Route::get(
        '{typeId}/resistance',
        [TypeController::class, 'resistance']
    );
});

Route::group(['prefix' => 'move'], function () {
    Route::get('/', [MoveController::class, 'index']);
    Route::get(
        '{moveId}/infos',
        [MoveController::class, 'infos']
    );
});

Route::group(['prefix' => 'ability'], function () {
    Route::get('/', [AbilityController::class, 'index']);
    Route::get(
        '{abilityId}/infos',
        [AbilityController::class, 'infos']
    );
});
