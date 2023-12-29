<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class EquiposPokemonSeeders extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('equipos_pokemones')->insert([
            'id_equipos' => 1,
            'id_pokemones' => 1,
        ]);

        DB::table('equipos_pokemones')->insert([
            'id_equipos' => 1,
            'id_pokemones' => 2,
        ]);

        DB::table('equipos_pokemones')->insert([
            'id_equipos' => 1,
            'id_pokemones' => 3,
        ]);

        DB::table('equipos_pokemones')->insert([
            'id_equipos' => 2,
            'id_pokemones' => 4,
        ]);

        DB::table('equipos_pokemones')->insert([
            'id_equipos' => 2,
            'id_pokemones' => 5,
        ]);

        DB::table('equipos_pokemones')->insert([
            'id_equipos' => 2,
            'id_pokemones' => 6,
        ]);

        DB::table('equipos_pokemones')->insert([
            'id_equipos' => 3,
            'id_pokemones' => 7,
        ]);

        DB::table('equipos_pokemones')->insert([
            'id_equipos' => 3,
            'id_pokemones' => 8,
        ]);

        DB::table('equipos_pokemones')->insert([
            'id_equipos' => 4,
            'id_pokemones' => 9,
        ]);

        DB::table('equipos_pokemones')->insert([
            'id_equipos' => 4,
            'id_pokemones' => 10,
        ]);

        DB::table('equipos_pokemones')->insert([
            'id_equipos' => 4,
            'id_pokemones' => 11,
        ]);

        DB::table('equipos_pokemones')->insert([
            'id_equipos' => 5,
            'id_pokemones' => 12,
        ]);
        
        DB::table('equipos_pokemones')->insert([
            'id_equipos' => 6,
            'id_pokemones' => 13,
        ]);

        DB::table('equipos_pokemones')->insert([
            'id_equipos' => 6,
            'id_pokemones' => 14,
        ]);

        DB::table('equipos_pokemones')->insert([
            'id_equipos' => 6,
            'id_pokemones' => 15,
        ]);
    }
    
}
