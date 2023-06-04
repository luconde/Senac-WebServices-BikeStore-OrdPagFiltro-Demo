<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateClientesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('clientes', function (Blueprint $table) {
            $table->increments('pkcliente');
            $table->string('nome')->nullable();
            $table->string('telefone', 25)->nullable();
            $table->string('email');
            $table->string('rua')->nullable();
            $table->string('cidade', 50)->nullable();
            $table->string('estado', 25)->nullable();
            $table->string('cep', 5)->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('clientes');
    }
}
