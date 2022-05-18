<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('perguntas', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pesquisa');
            $table->foreign('id_pesquisa')->references('id')->on('pesquisas');
            $table->tipo('string');
            $table->texto('text');
            $table->unsignedBigInteger('id_opc_resposta')->nullable()->default(NULL);
            $table->foreign('id_opc_resposta')->references('id')->on('opc_respostas');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('perguntas');
    }
};

