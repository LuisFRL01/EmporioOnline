<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
     //'nome', 'quantidade', 'preco', 'data', 'descricao', 'estado', 'avaliacao', 'nota',
    public function up()
    {
        Schema::create('produtos', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('nome');
            $table->integer('quantidade');
            $table->double('preco');
            $table->date('data');
            $table->string('descricao');
            $table->boolean('estado');
            $table->mediumText('avaliacao');
            $table->double('nota');
            $table->integer('usuario_id')->unsigned();
            $table->foreign('usuario_id')->references('id')->on('usuarios');
            $table->integer('administrador_id')->unsigned();
            $table->foreign('administrador_id')->references('id')->on('administradors');
            $table->integer('pedido_id')->unsigned();
            $table->foreign('pedido_id')->references('id')->on('pedidos');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('produtos');
    }
}