<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use App\Entrenador;

class EquiposTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('equipos')->insert([
            'id_entrenadores' => 1,
            'nombre' => 'equipo1',
        ]);
        DB::table('equipos')->insert([
            'id_entrenadores' => 2,
            'nombre' => 'equipo2',
        ]);
        DB::table('equipos')->insert([
            'id_entrenadores' => 3,
            'nombre' => 'equipo3',
        ]);
        DB::table('equipos')->insert([
            'id_entrenadores' => 4,
            'nombre' => 'equipo4',
        ]);
        DB::table('equipos')->insert([
            'id_entrenadores' => 5,
            'nombre' => 'equipo5',
        ]);
        DB::table('equipos')->insert([
            'id_entrenadores' => 6,
            'nombre' => 'equipo5',
        ]);
    }
}
