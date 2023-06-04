<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    // campos publicáveis
    protected $fillable = ['statusdopedido','datadopedido','datarequisitada', 'datadeentrega'];

    // nome da chave primaria
    protected $primaryKey = 'pkpedido'; 

    // Tabela
    protected $table = 'pedidos';

    // Informa que esta trabalhando com incremento
    public $incrementing = true;

    // não utiliza timestamps nos controles (created & updated)
    public $timestamps = false;

    public function cliente() {
        return $this->belongsTo(Cliente::class,'fkcliente','pkcliente');
    }

    public function itensdopedido() {
        return $this->hasMany(Itemdopedido::class, 'fkpedido' ,'pkpedido');
    }
}
