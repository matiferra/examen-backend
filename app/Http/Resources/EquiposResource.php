<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class EquiposResourse extends JsonResource
{

    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return $this->resource->map(function ($equipo) {
            return [
                'id' => $equipo->id,
                'nombre' => $equipo->nombre,
                'entrenador' => new EntrenadorResource($equipo->entrenador),
                'pokemones' => PokemonResource::collection($equipo->pokemones),
            ];
        });
    }
}
