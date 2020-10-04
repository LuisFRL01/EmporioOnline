<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class ProdutoTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function inicializarArrayProduto(){
        return $dados = ['nome' => 'Ryzen 5', 'quantidade' => 5,
            'preco' => 500 ,'descricao' => 'Melhor Ryzen 5 do Mercado', 'estado' => 1];
    }

    public function testAcessarCadastroProdutos()
    {
        $usuario = User::where('id', '=', '1')
            ->first();
        $response = $this
            ->actingAs($usuario)->get('/cadastrarProduto')
            ->assertStatus(200);
        $response->assertStatus(200);
    }

    public function testCadastrarProduto(){
        $usuario = User::where('id', '=', '1')
            ->first();
        $dados = $this->inicializarArrayProduto();
        $response = $this
            ->actingAs($usuario)
            ->post('/cadastrarProduto', $dados)
            ->assertStatus(302)
            ->assertRedirect('/listarProdutos');
    }
}
