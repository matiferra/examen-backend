<?php

use Illuminate\Support\Facades\Route;

Route::prefix('entrenadores')->group(function () {
    Route::get('listar', 'EntrenadorController@listar');
    Route::post('crear', 'EntrenadorController@crear');
    Route::get('{id}', 'EntrenadorController@detalle')
        ->where('id', '[0-9]+');
});
Route::prefix('pokemones')->group(function () {
    Route::get('listar', 'PokemonController@listar');
    Route::get('{id}', 'PokemonController@detalle')
        ->where('id', '[0-9]+');
});
Route::prefix('equipos')->group(function () {
    Route::get('listar/{id}', 'EquipoController@listar');
    Route::post('crear', 'EquipoController@crear');
    Route::get('{id}', 'EquipoController@detalle')
        ->where('id', '[0-9]+');
});

Route::prefix('app')->group(function () {
    Route::get('pokemones', 'AppController@getPokemones');
});
