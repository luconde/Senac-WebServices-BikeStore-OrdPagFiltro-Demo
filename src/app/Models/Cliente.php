<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    use HasFactory;

        // campos publicáveis
        protected $fillable = ['nome','telefone','email','rua','cidade','estado','cep'];

        // nome da chave primaria
        protected $primaryKey = 'pkcliente'; 

        // Nome da tabela
        protected $table = 'clientes';

    
        // Informa que esta trabalhando com incremento
        public $incrementing = true;
    
        // não utiliza timestamps nos controles (created & updated)
        public $timestamps = false;


        public function pedidos() {
            return $this->hasMany(Produto::class);
        }
}
