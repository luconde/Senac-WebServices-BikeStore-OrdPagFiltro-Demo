<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Api\CategoriaController;
use App\Http\Controllers\Api\MarcaController;
use App\Http\Controllers\Api\ClienteController;
use App\Http\Controllers\Api\PedidoController;
use App\Http\Controllers\Api\ProdutoController;
use App\Http\Controllers\Api\ItemdopedidoController;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

// Rota para categorias
route::apiResource('categorias', CategoriaController::class);

// Rota para marcas
route::apiResource('marcas', MarcaController::class);

// Rota para clientes
route::apiResource('clientes', ClienteController::class);

// Rota para os produtos
route::apiResource('produtos', ProdutoController::class);

// Rota para os produtos
route::apiResource('clientes.pedidos', PedidoController::class)->shallow();

// Rota para os produtos
route::apiResource('pedidos.itensdopedido', ItemdopedidoController::class);