<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class CategoriaResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // Mantido para documentação
        // return parent::toArray($request);

        return [
            'id' => $this->pkcategoria,
            'nome_da_categoria' => $this->nomedacategoria
        ];
    }
}
