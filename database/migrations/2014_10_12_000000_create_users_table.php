<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('email')->unique();
            $table->string('cpf')->unique();
            $table->string('numTelefone')->nullable();
            $table->string('cartao')->nullable()->nullable();
            $table->boolean('ativo')->default(1);
            $table->string('rua')->nullable();
            $table->string('numeroResidencia')->nullable();
            $table->string('bairro')->nullable();
            $table->string('cep')->nullable();
            $table->timestamp('email_verified_at')->nullable();
            $table->string('password');
            $table->rememberToken();
            $table->string('tipo');
            $table->foreignId('current_team_id')->nullable();
            $table->text('profile_photo_path')->nullable();
            //$table->integer('userable_id')->nullable();
            //$table->string('userable_type')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
