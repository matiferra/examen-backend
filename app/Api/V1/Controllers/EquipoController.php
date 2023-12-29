<?php

namespace App\Api\V1\Controllers;

use App\Entrenador;
use Exception;
use App\Equipo;
use App\EquipoPokemon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Resources\EquipoResource;
use App\Http\Resources\EquiposResource;
use App\Pokemon;

use function GuzzleHttp\json_encode;

class EquipoController extends Controller
{
    public function listar(Request $request, $id)
    {

        try {

            // $request->validate(['id_entrenador' => 'required|exists:entrenadores,id']);
            // $idEntrenador = $request->id_entrenador;

            //$equipos = Equipo::where('id_entrenadores', $idEntrenador)->paginate(10);

            // return [
            //     'status' => 'ok',
            //     'equipos' => $equipos
            // ];

            $equipo = Equipo::with(['pokemones', 'entrenador'])
                ->where('id', $id)
                ->firstOrFail();

            return response()->json(new EquipoResource($equipo));
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function detalle($id)
    {
        $equipo = null;

        try {
            $equipo = Equipo::select(
                'equipos.id as id',
                'equipos.nombre as nombre',
                //'entrenadores.nombre as nombre_entrenador',
                'pokemones.id as id_pokemones',
                'pokemones.nombre as nombre_pokemones',
                'pokemones.tipo as tipos_pokemones',
                'equipos_pokemones.orden as orden_pokemones'
            )
                ->join('equipos_pokemones', 'equipos_pokemones.id_equipos', 'equipos.id')
                ->join('pokemones', 'pokemones.id', 'equipos_pokemones.id_pokemones')
                //->join('entrenadores', 'entrenadores.id', 'equipos.id_entrenadores')
                ->where('equipos.id', $id)
                ->get()
                ->toArray();


            if (empty($equipo)) {
                throw new Exception("No se encontro el equipo.");
            }

            return [
                'status' => 'ok',
                'equipo' => $equipo
            ];
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function crear(Request $request)
    {
        $request->validate(
            [
                'nombre' => 'required|min:3',
                'id_entrenador' => 'required|exists:entrenadores,id',
                'id_pokemon1' => 'required|exists:pokemones,id|unique:equipos_pokemones,id_pokemones',
                'id_pokemon2' => 'exists:pokemones,id|unique:equipos_pokemones,id_pokemones',
                'id_pokemon3' => 'exists:pokemones,id|unique:equipos_pokemones,id_pokemones',
            ]
        );

        $entrenador = Entrenador::find($request->id_entrenador);

        if (!$entrenador) {
            return response()->json(['error' => 'Entrenador no encontrado'], 404);
        }

        $equipo = $entrenador->equipos()->create([
            'id_entrenadores' => $entrenador->id,
            'nombre' => $request->nombre,
        ]);

        $pokemones = [];

        $idPokemon1 = $request->id_pokemon1;
        array_push($pokemones, Pokemon::find($idPokemon1));

        if ($request->id_pokemon2) {
            $idPokemon2 = $request->id_pokemon2;
            array_push($pokemones, Pokemon::find($idPokemon2));
        }

        if ($request->id_pokemon3) {
            $idPokemon3 = $request->id_pokemon3;
            array_push($pokemones, Pokemon::find($idPokemon3));
        }


            // foreach (['id_pokemon1', 'id_pokemon2', 'id_pokemon3'] as $pokemonKey) {
            //     if ($request->has($pokemonKey)) {
            //         $idPokemon = $request->input($pokemonKey);
            //         $pokemon = Pokemon::find($idPokemon);

            //         if ($pokemon) {
            //             $pokemones[] = $pokemon;
            //         }
            //     }
            // }

        ;

        foreach ($pokemones as $pok) {

            $pokemon = Pokemon::find($pok);

            if ($pokemon) {
                EquipoPokemon::create([
                    'id_equipos' => $equipo->id,
                    'id_pokemones' => $pokemon[0]->id,
                ]);
            }
        }

        return
            response()->json([
                'status' => 'ok',
                'nuevo_equipo' => [
                    "id" => $equipo->id,
                    "nombre" => $equipo->nombre,
                    "entrenador" => $entrenador,
                    "pokemones" => [
                        $pokemones,
                    ]
                ]
            ]);
    }
}
