<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Carbon;
use Illuminate\Http\Request;

use App\Http\Requests\StorePedidoRequest;
use App\Http\Resources\PedidoResource;
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Itemdopedido;

class PedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Cliente $cliente)
    {
        $pedidos = Pedido::with(['Cliente','itensdopedido','itensdopedido.produto'])->where('fkcliente', $cliente->pkcliente)->get();

        return response() -> json([
            'status' => 200,
            'mensagem' => 'Lista de pedidos retornada',
            'pedidos' => PedidoResource::collection($pedidos),
        ], 200);
    }
        
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Cliente $cliente, StorePedidoRequest $request)
    {
        // Cria o objeto 
        $pedido =new Pedido();
        // Transfere os valores
        $pedido->fkcliente = $cliente->pkcliente;
        $pedido->statusdopedido = 0;
        $pedido->datadopedido = Carbon::now()->format('Y-m-d');
        $pedido->datarequisitada = $request->data_requisitada;
        // Salva
        $pedido->save();
        // Retorna o resultado
        return response() -> json([
            'status' => 200,
            'mensagem' => 'Pedido armazeado',
            'pedido' => new PedidoResource($pedido)
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido)
    {
        $pedido = Pedido::with(['cliente','itensdopedido','itensdopedido.produto'])->find($pedido->pkpedido);

        return response() -> json([
            'status' => 200,
            'mensagem' => 'Pedido retornado',
            'pedido' => new PedidoResource($pedido)
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function update(StorePedidoRequest $request, Pedido $pedido)
    {
       // $marca = Marca::find($marca->pkcategoria);
        $pedido->datarequisitada = $request->data_requisitada;
        $pedido->update();
        return response() -> json([
            'status' => 200,
            'mensagem' => 'Pedido atualizado'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pedido  $pedido
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido)
    {
        $pedido->delete();
        return response() -> json([
            'status' => 200,
            'mensagem' => 'Pedido apagado'
        ], 200);
    }
}
