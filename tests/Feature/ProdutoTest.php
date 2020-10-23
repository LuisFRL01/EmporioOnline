<?php

namespace Tests\Feature;

use App\Models\Produto;
use App\Models\User;
use Tests\TestCase;

class ProdutoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function testAcessarCadastroProdutos()
    {
        $usuario = User::where('id', '=', '1')
            ->first();
        $response = $this
            ->actingAs($usuario)->get('/cadastrarProduto')
            ->assertStatus(200);
        $response->assertStatus(200);
    }

    public function inicializarArrayProduto(){
        $produto = Produto::factory()->make();
        $dados = $produto->toArray();
        return $dados;
    }

    //Por algum motivo, há uma chamada para getPhotoUrlAttribute que resulta em um erro.
    //Não achamos esse metodo, nem onde ele é executado


    public function testCadastrarProduto(){
        $usuario = User::where('id', '=', '1')
            ->first();
        $dados = $this->inicializarArrayProduto();
        $response = $this
            ->actingAs($usuario)
            ->post('/cadastrarProduto', $dados)
            ->assertStatus(302);
    }
}
