<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToItensdopedidoTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('itensdopedido', function (Blueprint $table) {
            $table->foreign(['fkproduto'], 'FK__itensdope__fkpro__4F47C5E3')->references(['pkproduto'])->on('produtos')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['fkpedido'], 'FK__itensdope__fkped__4E53A1AA')->references(['pkpedido'])->on('pedidos')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('itensdopedido', function (Blueprint $table) {
            $table->dropForeign('FK__itensdope__fkpro__4F47C5E3');
            $table->dropForeign('FK__itensdope__fkped__4E53A1AA');
        });
    }
}
