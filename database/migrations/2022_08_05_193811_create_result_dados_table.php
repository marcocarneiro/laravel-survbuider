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
        Schema::create('result_dados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_resultados');
            $table->foreign('id_resultados')->references('id')->on('resultados');
            $table->unsignedBigInteger('id_pergunta');
            $table->foreign('id_pergunta')->references('id')->on('perguntas');
            $table->string('resposta');
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
        Schema::dropIfExists('result_dados');
    }
};
