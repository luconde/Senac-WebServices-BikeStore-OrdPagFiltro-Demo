<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Produto;

class Marca extends Model
{
    use HasFactory;

    // campos publicáveis
    protected $fillable = ['nomedamarca'];

    // nome da chave primaria
    protected $primaryKey = 'pkmarca'; 

    // Nome da tabela
    protected $table = 'marcas';

    // Informa que esta trabalhando com incremento
    public $incrementing = true;

    // não utiliza timestamps nos controles (created & updated)
    public $timestamps = false;

    public function produtos() {
        return $this->hasMany(Produto::class);
    }
}
