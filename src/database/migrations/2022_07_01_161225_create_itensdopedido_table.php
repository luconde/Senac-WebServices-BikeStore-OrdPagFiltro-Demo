<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateItensdopedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('itensdopedido', function (Blueprint $table) {
            $table->increments('pkitemdopedido');
            $table->integer('fkpedido');
            $table->integer('fkproduto');
            $table->integer('quantidade');
            $table->decimal('precodelista', 10);
            $table->decimal('desconto', 4)->default(0);
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('itensdopedido');
    }
}
