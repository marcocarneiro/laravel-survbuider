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

        //Grava dados da pesquisa e retorna o registro da pesquisa
        $pesquisa->save();
        $reg = $pesquisa->id;                
        
        //Laço para gravar as perguntas e atributos
        $perguntas = $request->txt_pergunta;
        $perguntasTipos = $request->tipo;
        $perguntasNum = $request->numPergunta;

        for($i=0; $i < count($perguntas); $i++)
        {
            $pergunta = new Pergunta;
            $pergunta->id_pesquisa = $reg;
            $pergunta->txt_pergunta = $perguntas[$i];
            $pergunta->tipo = $perguntasTipos[$i];

            $pergunta->save();
            $regPergunta = $pergunta->id;

            //Se o tipo for checkbox ou radio grava as opções de resposta - laço de opções
            if($perguntasTipos[$i] == 'checkbox' || $perguntasTipos[$i] == 'radio'){
                $opcoesRespostas = $request->txt_opc_resposta;
                /* //Estratégia para definir o escopo das opções de resposta
                   //$numStart e $numEnd definem o intervalo das opções de reposta
                   //com base nos valores do campo oculto numPergunta */
                $numStart = $perguntasNum[$i];
                if($numStart == 0){
                    $numEnd = count($perguntasNum);
                }else{
                    $numEnd = count($perguntasNum) - $numStart;
                }
                for($iOpc=$numStart; $iOpc < $numEnd; $iOpc++)
                {
                    $opcao = new Opc_resposta;
                    $opcao->id_pergunta = $regPergunta;
                    $opcao->txt_opc_resposta = $opcoesRespostas[$iOpc];

                    $opcao->save();
                }
            }
        }

        return redirect('dashboard');
    }
}
