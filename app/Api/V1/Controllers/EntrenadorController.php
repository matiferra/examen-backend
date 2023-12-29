<?php

namespace App\Api\V1\Controllers;

use Exception;
use App\Entrenador;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\ValidationException;

class EntrenadorController extends Controller
{
    public function crear(Request $request)
    {
        try {

            $request->validate([
                'nombre' => 'required|min:3',
            ]);

            $entrenador = Entrenador::create([
                'nombre' => $request->nombre
            ]);

            return [
                'status' => 'ok',
                'id_entrenador' => $entrenador->id
            ];
        } catch (ValidationException $exc) {
            throw new Exception("Debe Ingresar un nombre con min 3 caracteres");
        } catch (Exception $e) {
            throw $e;
        }
    }

    public function detalle($id_entrenador)
    {
        $entrenador = Entrenador::with('equipos')->find($id_entrenador);

        if (!$entrenador) {
            return response()->json(['error' => 'Entrenador no encontrado'], 404);
        }

        return response()->json($entrenador);
    }

    public function listar()
    {

        $entrenadores = Entrenador::with('equipos')->get();

        return response()->json($entrenadores);
    }
}
