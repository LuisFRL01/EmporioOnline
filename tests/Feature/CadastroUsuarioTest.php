<?php

namespace Tests\Feature;

use App\Models\User;
use Tests\TestCase;

class CadastroUsuarioTest extends TestCase
{

    public function inicializarDadosUsuario()
    {
        $user = User::factory()->make();
        $user['password'] = 'password';
        $dados = $user->toArray();
        return $dados;
    }

    public function testRegistrarUsuario()
    {
        $dados = $this->inicializarDadosUsuario();
        $response = $this->post('/register', $dados)
            ->assertStatus(302);
    }
}
