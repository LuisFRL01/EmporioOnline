<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\cadastroProdutoController;
use App\Http\Controllers\deletarProdutoController;
use App\Http\Controllers\editarProdutoController;
use App\Http\Controllers\listarProdutosController;

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

Route::middleware(['auth:sanctum', 'verified'])->get('/cadastrarProduto', [cadastroProdutoController::class, 'preparar']);

Route::post('/cadastrarProduto', [cadastroProdutoController::class, 'cadastrar'])->name('cadastrarProduto');

Route::post('/atualizarProduto', [editarProdutoController::class, 'atualizar'])->name('atualizarProduto');

Route::middleware(['auth:sanctum', 'verified'])->get('/editarProduto/{id}', [editarProdutoController::class, 'editar']);

Route::middleware(['auth:sanctum', 'verified'])->get('/deletarProduto/{id}', [deletarProdutoController::class, 'deletar']);

Route::middleware(['auth:sanctum', 'verified'])->get('/listarProdutos', [listarProdutosController::class, 'listar'])->name('produtos');

Route::middleware(['auth:sanctum', 'verified'])->get('/cadastroCategoria', [\App\Http\Controllers\CadastroCategoriaController::class, 'show']);

Route::post('/cadastroCategoria', [\App\Http\Controllers\CadastroCategoriaController::class, 'cadastrar'])->name('cadastroCategoria');

Route::middleware(['auth:sanctum', 'verified'])->get('/listaCategorias', [\App\Http\Controllers\ListaCategoriasController::class, 'show'])->name('categorias');

Route::middleware(['auth:sanctum', 'verified'])->get('/deletarCategoria/{id}', [\App\Http\Controllers\DeletaCategoriaController::class, 'deletar']);

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
