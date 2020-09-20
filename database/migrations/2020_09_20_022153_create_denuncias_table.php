<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDenunciasTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     
     //'mensagem'
    public function up()
    {
        Schema::create('denuncias', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->mediumText('mensagem');
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->integer('produto_id')->unsigned();
            $table->foreign('produto_id')->references('id')->on('produtos');
            $table->integer('administrador_id')->unsigned();
            $table->foreign('administrador_id')->references('id')->on('administradors');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('denuncias');
    }
}
