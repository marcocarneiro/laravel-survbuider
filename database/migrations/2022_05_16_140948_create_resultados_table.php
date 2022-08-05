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
        Schema::create('resultados', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('id_pesquisa');
            $table->foreign('id_pesquisa')->references('id')->on('pesquisas');
            $table->boolean('aceite');
            $table->ipAddress('ip_usuario');
            $table->string('navegador');
            $table->timestamp('data_hora_inicio')->nullable();
            $table->timestamp('data_hora_final')->nullable();
            $table->boolean('completo');
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
        Schema::dropIfExists('resultados');
    }
};

