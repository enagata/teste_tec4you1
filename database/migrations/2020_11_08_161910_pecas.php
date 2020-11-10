<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Pecas extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('Pecas', function (Blueprint $table) {
            $table->id('id_pecas');
            $table->string('nome_Pecas');
            $table->integer('id_Marca');
            $table->integer('id_Veiculo');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('Pecas');
    }
}
