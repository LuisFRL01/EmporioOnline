<?php

namespace Tests\Unit;

use App\Models\Produto;
use App\Validator\ProdutoValidator;
//use PHPUnit\Framework\TestCase;
use Tests\TestCase;

class ProdutoTest extends TestCase
{

    public function testSalvarProdutoNoBanco()
    {
        $produto = Produto::factory()->make();
        self::assertTrue($produto->save());

    }
}
