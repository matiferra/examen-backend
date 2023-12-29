<?php

namespace App;

use Exception;
use GuzzleHttp\Client;

class PokeApi
{
    private $urlApi = "https://pokeapi.co/api/v2/";

    private $LIMITE;

    private $client;

    private $pokemones;


    public function __construct($LIMINTE)
    {
        $this->client = new Client();
        $this->pokemones = [];
        $this->LIMITE = $LIMINTE;
    }

    public function getUrlApi()
    {
        return $this->urlApi;
    }

    public function getPokemones()
    {
        try {
            for ($i = 1; $i <= $this->LIMITE; $i++) {

                $response = $this->client->get($this->getUrlApi() . "pokemon/" . $i);

                $apiData = json_decode($response->getBody());

                $pokemon = [
                    'nombre' => $apiData->name,
                    'tipo' => $apiData->types[0]->type->name
                ];

                array_push($this->pokemones, $pokemon);
                
            }

            $this->crear($this->pokemones);

            return response()->json(['message' => 'Solicitud a la API exitosa', 'pokemons' => $this->pokemones]);
        } catch (\Exception $e) {
            return response()->json(['error' => 'Error al realizar la solicitud a la API', 'message' => $e->getMessage()], 500);
        }
    }

    private function crear($pokemones)
    {
        foreach ($pokemones as $pokemon) {
            Pokemon::create($pokemon);
        }
    }
}
