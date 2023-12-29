<?php

namespace App\Api\V1\Controllers;

use App\PokeApi;
use App\Pokemon;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Resources\PokemonResource;
use Exception;

use GuzzleHttp\Client;

class AppController extends Controller
{

    protected $LIMITE_POKEMONTES = 15; 

    public function getPokemones()
    {
        $PokeApi = new PokeApi($this->LIMITE_POKEMONTES);

        $response = $PokeApi->getPokemones();

        return $response;
    }
}