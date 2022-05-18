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

/* 
<b>aceite</b> - Aceite do participante após a leitura da página inicial da pesquisa <br>
<b>ip_usuario</b> - IP do usuário no momento em que inicia a pesquisa <br>
<b>navegador</b> - Navegador do usuário no momento em que inicia a pesquisa <br>
<b>data_hora_inicio</b> - Data e hora quando usuário iniciou a pesquisa <br>
<b>data_hora_final</b> - Data e hora quando usuário finalizou a pesquisa <br>
<b>dados</b> - Respostas do usuário no formato JSON <br>
<b>completo</b> - Booleano, indica se o usuário finalizou a pesquisa ou não <br> */
