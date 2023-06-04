<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class ClienteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => $this->pkcliente,
            'nome' => $this->nome,
            'telefone' => $this->telefone,
            'email' => $this->email,
            'rua' => $this->rua,
            'cidade' => $this->cidade,
            'estado' => $this->estado,
            'cep' => $this->cep
        ];
}
}
