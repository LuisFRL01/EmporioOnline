<?php

namespace Tests\Unit;

use App\Models\User;
use App\Validator\UserValidator;
use Illuminate\Support\Facades\Log;
use Tests\TestCase;

class CadastroUsuarioTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testUsuarioCorreto()
    {
        $user = User::factory()->make();
        $dados = $user->toArray();
        $dados['password'] = 'password';
        $validator = UserValidator::validate($dados);
        $this->assertTrue(true);
    }
}
