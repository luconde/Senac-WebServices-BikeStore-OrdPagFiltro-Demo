<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Marca;
use App\Models\Categoria;

class Produto extends Model
{
    use HasFactory;

    // campos publicáveis
    protected $fillable = ['nomedoproduto', 'anodomodelo', 'precodelista'];

    // nome da chave primaria
    protected $primaryKey = 'pkproduto'; 
    
    // Nome da tabela
    protected $table = 'produtos';

    // Informa que esta trabalhando com incremento
    public $incrementing = true;
    
    // não utiliza timestamps nos controles (created & updated)
    public $timestamps = false;
    
    public function categoria() {
        return $this->belongsTo(Categoria::class, 'fkcategoria','pkcategoria');
    }

    public function marca() {
        return $this->belongsTo(Marca::class, 'fkmarca', 'pkmarca');
    }

    public function itensdopedido() {
        return $this->hasMany(Itensdopedido::class);
    }
}
