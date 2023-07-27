<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateDistribuidorTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('distribuidor', function (Blueprint $table) {
            $table->increments('id');
            $table->char('_ID',255);
            $table->char('login',255);
            /* $table->char('email',255);
            $table->char('password',255); */
            $table->unsignedBigInteger('user');
            $table->timestamps();

            $table->foreign('user')->references('id')->on('user');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('distribuidor');
    }
}
