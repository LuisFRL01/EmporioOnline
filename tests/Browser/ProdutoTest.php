<?php

namespace Tests\Browser;

use App\Models\Categoria;
use App\Models\User;
use Illuminate\Support\Facades\Log;
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

        $admin = User::factory()->make(['tipo' => 'admin']);
        $admin->save();
        $categoria = Categoria::factory()->make(['administrador_id' => $admin->id]);
        $categoria['id'] = 1;
        $categoria->save();

        $this->browse(function (Browser $browser)  {
            $browser->visit('/cadastrarProduto')
                ->type('nome', 'AMD Intel Core I5')
                ->type('quantidade', 10)
                ->type('preco', 1000)
                ->type('descricao', 'Melhor processador para publico gamer da AMD INTEL')
                ->select('categoriaMenu', 1)
                ->attach('photo_url', __DIR__.'/screenshots/img.jpg')
                ->press('cadastrar')
                ->assertPathIs('/listarProdutos');
        });
    }
    
    public function testAlterarProduto(){
        $this->testCadastroProduto();
        $this->browse(function (Browser $browser)  {
            $browser->visit('/editarProduto/1')
                ->type('nome', 'AMD Intel Core I5')
                ->select('categoriaMenu', 1)
                ->attach('photo_url', __DIR__.'/screenshots/img.jpg')
                ->press('alterar')
                ->assertPathIs('/listarProdutos');
        });
    }
}
