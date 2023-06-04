<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Http\Requests\StoreMarcaRequest;
use App\Http\Resources\MarcaResource;
use App\Models\Marca;

class MarcaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $marcas = Marca::all();
        return response() -> json([
            'status' => 200,
            'mensagem' => 'Lista de marcas retornada',
            'marcas' => MarcaResource::collection($marcas)
]       , 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreMarcaRequest $request)
    {
        // Cria o objeto 
        $marca =new Marca();
        // Transfere os valores
        $marca->nomedamarca = $request->nome_da_marca;
        // Salva
        $marca->save();
        // Retorna o resultado
        return response() -> json([
            'status' => 200,
            'mensagem' => 'Marca armazenada',
            'marca' => new MarcaResource($marca)
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function show(Marca $marca)
    {
        $marca = Marca::find($marca->pkmarca);
        return response() -> json([
            'status' => 200,
            'mensagem' => 'Marca retornada',
            'marca' => new MarcaResource($marca)
        ], 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function update(StoreMarcaRequest $request, Marca $marca)
    {
       // $marca = Marca::find($marca->pkcategoria);
        $marca->nomedamarca = $request->nome_da_marca;
        $marca->update();
        return response() -> json([
            'status' => 200,
            'mensagem' => 'Marca atualizada'
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Marca  $marca
     * @return \Illuminate\Http\Response
     */
    public function destroy(Marca $marca)
    {
        $marca->delete();
        return response() -> json([
            'status' => 200,
            'mensagem' => 'Marca apagada'
    ], 200);
    }
}
