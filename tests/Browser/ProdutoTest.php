<?php

namespace Tests\Browser;

use App\Models\User;
use Illuminate\Foundation\Testing\DatabaseMigrations;
use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class produtoTest extends DuskTestCase
{
    /**
     * A Dusk test example.
     *
     * @return void
     */
    public function testLogin()
    {
        $user = User::factory()->make();
        $user->save();
        $this->browse(function (Browser $browser) use($user) {
            $browser->visit('/login')
                ->type('email', $user->email)
                ->type('password', 'password')
                ->press('LOGIN')
                ->assertPathIs('/dashboard');
        });
    }

    public function testCadastroProduto(){
        $this->testLogin();
        $this->browse(function (Browser $browser)  {
            $browser->visit('/cadastrarProduto')
                ->type('nome', 'AMD Intel Core I5')
                ->type('quantidade', 10)
                ->type('preco', 1000)
                ->type('descricao', 'Melhor processador para publico gamer da AMD INTEL')
                ->press('cadastrar')
                ->assertPathIs('/listarProdutos');
        });
    }
    public function testAlterarProduto(){
        $this->testCadastroProduto();
        $this->browse(function (Browser $browser)  {
            $browser->clickLink('Editar')
                ->type('nome', 'AMD Intel Core I7')
                ->press('alterar')
                ->assertPathIs('/listarProdutos');
        });
    }
}
