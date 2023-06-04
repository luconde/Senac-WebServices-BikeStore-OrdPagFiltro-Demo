<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddForeignKeysToProdutosTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->foreign(['fkcategoria'], 'FK__produtos__fkcate__44CA3770')->references(['pkcategoria'])->on('categorias')->onUpdate('CASCADE')->onDelete('CASCADE');
            $table->foreign(['fkmarca'], 'FK__produtos__fkmarc__45BE5BA9')->references(['pkmarca'])->on('marcas')->onUpdate('CASCADE')->onDelete('CASCADE');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('produtos', function (Blueprint $table) {
            $table->dropForeign('FK__produtos__fkcate__44CA3770');
            $table->dropForeign('FK__produtos__fkmarc__45BE5BA9');
        });
    }
}
