<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Carbon\Carbon;

use App\Models\User;
use App\Models\Pesquisa;
use App\Models\Pergunta;
use App\Models\Filtro;
use App\Models\Opc_resposta;
use App\Models\Consentimento;

class PesquisaAdmController extends Controller
{
    public function newPesquisa()
    {
        return view('admin.new-pesquisa');
    }

    public function storePesquisa(Request $request)
    { 
        $pesquisa = new Pesquisa;

        $pesquisa->user_id = auth()->user()->id;
        $pesquisa->titulo = $request->titulo;
        $pesquisa->slug = Str::slug($request->titulo, '-');
        $pesquisa->pesquisa_inicio  = Carbon::parse($request->pesquisa_inicio)->format('Y-m-d\TH:i');
        $pesquisa->pesquisa_final  = Carbon::parse($request->pesquisa_final)->format('Y-m-d\TH:i');
        $pesquisa->perguntas_por_tela = $request->perguntas_por_tela;
        $pesquisa->consentimento = $request->consentimento;
        $pesquisa->txt_consentimento = $request->txt_consentimento;

        //Grava dados da pesquisa
        $pesquisa->save();
        //Retorna o registro da pesquisa          
        $reg = $pesquisa->id;
                
        
        //Laço para gravar as perguntas
        $perguntas = $request->input('txt_perguntas[]');
        foreach($perguntas as $pergunta)
        {
            $pergunta = new Pergunta();
            $pergunta->id_pesquisa = $reg;
            $pergunta->tipo = $request->tipo;
            $pergunta->txt_pergunta = $request->txt_pergunta;

            $pergunta->save();
            dump($pergunta->id);
        }

    }
}
