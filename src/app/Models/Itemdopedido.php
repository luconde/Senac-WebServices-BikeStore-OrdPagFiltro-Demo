<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Itemdopedido extends Model
{
    use HasFactory;

    // campos publicáveis
    protected $fillable = ['quantidade','precodelista','desconto'];

    // nome da chave primaria
    protected $primaryKey = 'pkitemdopedido'; 

    // Nome da tabela
    protected $table = 'itensdopedido';    

    // Informa que esta trabalhando com incremento
    public $incrementing = true;

    // não utiliza timestamps nos controles (created & updated)
    public $timestamps = false;

    public function pedido() {
        return $this->belongsTo(Pedido::class,'fkpedido','pkpedido');
    }

    public function produto() {
        return $this->belongsTo(Produto::class,'fkproduto','pkproduto');
    }
}
