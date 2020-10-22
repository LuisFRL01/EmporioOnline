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
            $table->string('descricao');
            $table->boolean('estado')->default(1);
            $table->double('nota')->nullable();
            $table->integer('categoria_id')->unsigned();
            $table->foreign('categoria_id')->references('id')->on('categorias');
            $table->integer('user_id')->unsigned();
            $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
            $table->integer('administrador_id')->unsigned()->nullable();
            $table->foreign('administrador_id')->references('id')->on('users');
            $table->string('photo_url');
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
