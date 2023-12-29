<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EquipoResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */

    protected $LIMITE_POKEMONES = 3;


    public function toArray($request)
    {

        return [
            'id' => $this->id,
            'nombre' => $this->nombre,
            'entrenador' => new EntrenadorResource($this->entrenador),
            'pokemones' => PokemonResource::collection($this->pokemones->slice(0, $this->LIMITE_POKEMONES)),
        ];
    }
}
