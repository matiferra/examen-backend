<?php

namespace App\Api\V1\Controllers;

use App\Pokemon;
use App\Http\Controllers\Controller;
use App\Http\Resources\PokemonesResource;
use App\Http\Resources\PokemonResource;
use Exception;

class PokemonController extends Controller
{
    public function listar()
    {
        //$pokemones = [];
        
        try {
            //$pokemones = Pokemon::all();
            // return [
            //     'status' => 'ok',    
            //     'pokemones' => $pokemones
            // ];

            $pokemones = PokemonResource::collection(Pokemon::all());

            return response()->json(
                [
                    'status' => 'ok',
                    'pokemones' => $pokemones
                ]);
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function detalle($id_pokemon)
    {
        return response()->json( new PokemonResource(Pokemon::find($id_pokemon)));
    }


}
