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
use App\Http\Controllers\ListaUsuariosController;
use App\Http\Controllers\PesquisaProdutoController;
use App\Http\Controllers\WelcomeController;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware(['auth:sanctum', 'verified', 'check.user'])->get('/cadastrarProduto', [cadastroProdutoController::class, 'preparar']);

Route::post('/cadastrarProduto', [cadastroProdutoController::class, 'cadastrar'])->name('cadastrarProduto');

Route::post('/atualizarProduto', [editarProdutoController::class, 'atualizar'])->name('atualizarProduto');

Route::middleware(['auth:sanctum', 'verified', 'check.user'])->get('/editarProduto/{id}', [editarProdutoController::class, 'editar']);

Route::middleware(['auth:sanctum', 'verified', 'check.user'])->get('/deletarProduto/{id}', [deletarProdutoController::class, 'deletar']);

Route::middleware(['auth:sanctum', 'verified', 'check.user'])->get('/listarProdutos', [listarProdutosController::class, 'listar'])->name('produtos');


Route::get('/produto/{id}', [ExibeProdutoController::class, 'show']);


Route::middleware(['auth:sanctum', 'verified', 'check.user.admin'])->get('/cadastroCategoria', [CadastroCategoriaController::class, 'show']);

Route::post('/cadastroCategoria', [CadastroCategoriaController::class, 'cadastrar'])->name('cadastroCategoria');

Route::middleware(['auth:sanctum', 'verified', 'check.user.admin'])->get('/listaCategorias', [ListaCategoriasController::class, 'show'])->name('categorias');

Route::middleware(['auth:sanctum', 'verified', 'check.user.admin'])->get('/deletarCategoria/{id}', [DeletaCategoriaController::class, 'deletar']);

Route::middleware(['auth:sanctum', 'verified', 'check.user.admin'])->get('/listaUsuarios', [ListaUsuariosController::class, 'show'])->name('usuarios');

Route::middleware(['auth:sanctum', 'verified', 'check.user.admin'])->get('/desativarUsuario/{id}', [DesativaUsuarioController::class, 'desativar']);

Route::get('/', [WelcomeController::class, 'show']);

Route::get('/pesquisaProduto', [PesquisaProdutoController::class, 'show'])->name('pesquisaProduto');

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
