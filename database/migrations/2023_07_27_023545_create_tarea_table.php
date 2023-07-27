<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTareaTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tarea', function (Blueprint $table) {
            $table->increments('id');
            $table->char('_ID',255);
            $table->char('fecha',255);
            $table->char('nombre',255);
            $table->char('direccion',255);
            $table->decimal('latitud',19,0);
            $table->decimal('longitud',19,0);
            $table->integer('mercancia');
            $table->char('estado',255);
            $table->unsignedBigInteger('distribuidor');
            $table->timestamps();

            $table->foreign('distribuidor')->references('id')->on('distribuidor');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tarea');
    }
}
