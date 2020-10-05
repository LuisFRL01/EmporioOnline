<?php

namespace Tests\Browser;

use Laravel\Dusk\Browser;
use Tests\DuskTestCase;

class CadastroUsuarioTest extends DuskTestCase
{
    public function testRegister()
    {
        $this->browse(function (Browser $browser) {
            $browser->visit('/register')
                ->type('name', 'Alex Silva')
                ->type('email', 'alex@gmail.com')
                ->type('cpf', 12345678912)
                ->type('numTelefone', 12345678912)
                ->type('rua', 'Rua Fernando Alfonso')
                ->type('numeroResidencia', '101A')
                ->type('bairro', 'Cohab 2')
                ->type('cep', 11098456)
                ->type('password', 'password')
                ->type('password_confirmation', 'password')
                ->pause(1000)
                ->press('register')
                ->assertPathIs('/dashboard')
                ->pause(1000);
        });
    }
}
