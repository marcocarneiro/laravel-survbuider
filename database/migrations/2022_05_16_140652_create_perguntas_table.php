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
            $table->unsignedBigInteger('id_grupo')->nullable();
            $table->foreign('id_grupo')->references('id')->on('filtros');
            $table->string('tipo');
            $table->text('txt_pergunta');
            $table->integer('id_opc_resposta');
            $table->string('midia')->nullable();
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

