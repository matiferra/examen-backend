<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Equipo extends Model
{
    public $timestamps = false;

    public $table = "equipos";

    protected $fillable = ['id_entrenadores', 'nombre'];

    public static function cleanEquipoDetalle($equipoData)
    {
        $equipo = [];
        foreach ($equipoData as $equipoElement) {
            $equipo['id'] = $equipoElement['id'];
            $equipo['nombre'] = $equipoElement['nombre'];

            $pokemones[] =                 [
                'id' => $equipoElement['id_pokemones'],
                'nombre' => $equipoElement['nombre_pokemones'],
                'tipo' => json_decode($equipoElement['tipos_pokemones']),
                'orden' => $equipoElement['orden_pokemones']
            ];
        }
        $equipo['pokemones'] = $pokemones;
        return $equipo;
    }

    public function entrenador()
    {
        return $this->belongsTo(Entrenador::class, 'id_entrenadores', 'id');
    }

    public function pokemones()
    {
        return $this->belongsToMany(Pokemon::class, 'equipos_pokemones', 'id_equipos', 'id_pokemones');
    }

}
