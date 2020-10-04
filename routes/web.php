<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now produto something great!
|
*/

Route::get('/cadastrarProduto', [\App\Http\Controllers\cadastroProdutoController::class, 'preparar']);

Route::post('/cadastrarProduto', [\App\Http\Controllers\cadastroProdutoController::class, 'cadastrar']);

Route::get('/listarProdutos', [\App\Http\Controllers\ListarProdutosController::class, 'listar']);

Route::get('/', function () {
    return view('welcome');
});


Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    return view('dashboard');
})->name('dashboard');
