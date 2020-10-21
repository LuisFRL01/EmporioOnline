<?php

use App\Http\Controllers\CadastroCategoriaController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cadastroProdutoController;
use App\Http\Controllers\DeletaCategoriaController;
use App\Http\Controllers\deletarProdutoController;
use App\Http\Controllers\DesativaUsuarioController;
use App\Http\Controllers\editarProdutoController;
use App\Http\Controllers\ExibeProdutoController;
use App\Http\Controllers\ListaCategoriasController;
use App\Http\Controllers\listarProdutosController;
use App\Http\Controllers\AdicionarPedidoController;
use App\Http\Controllers\DenunciaAnuncioController;
use App\Http\Controllers\EditaCategoriaController;
use App\Http\Controllers\ExibePedidoController;
use App\Http\Controllers\ListaDenunciaController;
use App\Http\Controllers\ListaTodosProdutosController;
use App\Http\Controllers\ListaUsuariosController;
use App\Http\Controllers\PesquisaProdutoController;
use App\Http\Controllers\ResolveDenunciaController;
use App\Http\Controllers\WelcomeController;

Route::middleware(['auth:sanctum', 'verified', 'check.user'])->group(function () {
    
    Route::get('/cadastrarProduto', [cadastroProdutoController::class, 'preparar']);

    Route::post('/cadastrarProduto', [cadastroProdutoController::class, 'cadastrar'])->name('cadastrarProduto');

    Route::post('/atualizarProduto', [editarProdutoController::class, 'atualizar'])->name('atualizarProduto');

    Route::get('/editarProduto/{id}', [editarProdutoController::class, 'editar']);

    Route::get('/deletarProduto/{id}', [deletarProdutoController::class, 'deletar']);

    Route::get('/listarProdutos', [listarProdutosController::class, 'listar'])->name('produtos');

    Route::get('/denunciaAnuncio/{id}', [DenunciaAnuncioController::class, 'show']);

    Route::post('/denunciaAnuncio', [DenunciaAnuncioController::class, 'sendDenuncia'])->name('denunciaAnuncio');
});

Route::middleware(['auth:sanctum', 'verified', 'check.user.admin'])->group(function () {
    
    Route::get('/cadastroCategoria', [CadastroCategoriaController::class, 'show']);

    Route::post('/cadastroCategoria', [CadastroCategoriaController::class, 'cadastrar'])->name('cadastroCategoria');

    Route::get('/listaCategorias', [ListaCategoriasController::class, 'show'])->name('categorias');

    Route::get('/editaCategoria/{id}', [EditaCategoriaController::class, 'show']);

    Route::post('/atualizaCategoria', [EditaCategoriaController::class, 'update'])->name('atualizaCategoria');

    Route::get('/listaUsuarios', [ListaUsuariosController::class, 'show'])->name('usuarios');

    Route::get('/desativaUsuario/{id}', [DesativaUsuarioController::class, 'desativar']);

    Route::get('/listaDenuncias', [ListaDenunciaController::class, 'show'])->name('denuncias');

    Route::get('/listaTodoProdutos', [ListaTodosProdutosController::class, 'show'])->name('todosProdutos');

    Route::get('/resolveDenuncia/{id}', [ResolveDenunciaController::class, 'resolver']);
});

Route::get('/produto/{id}', [ExibeProdutoController::class, 'show']);

Route::post('/adicionar', [AdicionarPedidoController::class, 'adicionar'])->name('adicionar');

Route::get('/pedido', [ExibePedidoController::class, 'exibe'])->name('pedido');

Route::get('/pesquisaProduto', [PesquisaProdutoController::class, 'show'])->name('pesquisaProduto');

Route::get('/', [WelcomeController::class, 'show']);

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
