<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateEquiposPokemonesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('equipos_pokemones', function (Blueprint $table) {
            $table->unsignedBigInteger('id_equipos');
            $table->unsignedBigInteger('id_pokemones');
            $table->tinyInteger('orden')->nullable();

            $table->foreign('id_equipos')
                ->references('id')
                ->on('equipos')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->foreign('id_pokemones')
                ->references('id')
                ->on('pokemones')
                ->onDelete('restrict')
                ->onUpdate('restrict');

            $table->primary(['id_equipos', 'id_pokemones']); 
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('equipos_pokemones');
    }
}
