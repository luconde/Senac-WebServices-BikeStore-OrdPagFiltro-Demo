<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\StoreItemdopedidoRequest;
use App\Http\Resources\ItemdopedidoResource;
use App\Models\Itemdopedido;
use App\Models\Pedido;

class ItemdopedidoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Pedido $pedido)
    {
        $itensdopedido = Itemdopedido::with(['pedido','pedido.cliente'])->where('fkpedido', $pedido->pkpedido)->get();
        return response() -> json([
            'status' => 200,
            'mensagem' => 'Lista de itens do pedido retornada',
            'itens' => ItemdopedidoResource::collection($itensdopedido)
]       , 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreItemdopedidoRequest $request, $item)
    {
        $itemdopedido = new Itemdopedido();
        $itemdopedido->desconto = $request->desconto;
        $itemdopedido->precodelista = $request->preco_de_lista;
        $itemdopedido->quantidade = $request->quantidade;
        $itemdopedido->fkpedido = $item;
        $itemdopedido->fkproduto = $request->produto['id'];
        $itemdopedido->save();


        return response() -> json([
            'status' => 200,
            'mensagem' => 'Item armazenado',
            'item' => new ItemdopedidoResource($itemdopedido)
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Pedido $pedido, $item)
    {
        $itemdopedido = Itemdopedido::find($item);

        return response() -> json([
            'status' => 200,
            'mensagem' => 'Item retornado',
            'item' => new ItemdopedidoResource($itemdopedido)
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(StoreItemdopedidoRequest $request, Pedido $pedido, $item)
    {
        $itemdopedido = Itemdopedido::find($item); 

        $itemdopedido->desconto = $request->desconto;
        $itemdopedido->precodelista = $request->preco_de_lista;
        $itemdopedido->quantidade = $request->quantidade;
        $itemdopedido->update();


        return response() -> json([
            'status' => 200,
            'mensagem' => 'Item atualizado'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pedido $pedido, $item)
    {
        $itemdopedido = Itemdopedido::find($item); 

        $itemdopedido->delete();

        return response() -> json([
            'status' => 200,
            'mensagem' => 'Item apagado'
        ], 200);
    }
}
