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
use App\Models\Resultado;
use App\Models\Result_dado;

class PesquisaAdmController extends Controller
{
    /*
    ////////////////////  APLICAÇÃO DAS PESQUISAS  //////////////////////
    */
    public function surv($url)
    {
        $pesquisa = Pesquisa::where('url_slug', $url)->first();
        $perguntas = Pergunta::where('id_pesquisa', $pesquisa->id)->get();
        $opcoesResposta = [];        

        foreach($perguntas as $pergunta){
            array_push($opcoesResposta, Opc_resposta::where('id_pergunta', $pergunta->id)->get());
        }

        $parametros = [
            'pesquisa'=> $pesquisa, 
            'perguntas'=>$perguntas, 
            'opcoesResposta'=>$opcoesResposta,
        ];

        return view('pesquisa', $parametros);
    }

    public function storeResultado(Request $request)
    {
        $resultado =  new Resultado;
        $resultado->ip_usuario = $request->ip();
        $resultado->navegador = $request->header('User-Agent');        
        $resultado->aceite = 1;
        $resultado->id_pesquisa = $request->id_pesquisa;
        $resultado->data_hora_inicio = Carbon::parse($request->data_hora_inicio)->format('Y-m-d\TH:i');
        $resultado->data_hora_final = Carbon::parse(date('m/d/Y h:i:s a', time()))->format('Y-m-d\TH:i');        
        $resultado->completo = 1;

        $resultado->save();
        $reg = $resultado->id;

        $perguntas_id = $request->id_pergunta;
        $dados = $request->except(['_token', 'id_pesquisa', 'data_hora_inicio', 'ip', 'id_pergunta']);
        
        $i = 0;
        foreach($dados as $dado){
            if(gettype($dado) == 'array'){
                foreach($dado as $dad){
                    $result_dados = new Result_dado;
                    $result_dados->id_resultados = $reg;
                    $result_dados->id_pergunta = $perguntas_id[$i];
                    $result_dados->resposta = $dad;
                    $result_dados->save();
                }
            }else{
                $result_dados = new Result_dado;
                $result_dados->id_resultados = $reg;
                $result_dados->id_pergunta = $perguntas_id[$i];
                $result_dados->resposta = $dado;
                $result_dados->save();
            }
            $i ++;
        }
        return redirect('conclusao_pesquisa');       
    }

    public function conclusao_pesquisa()
    {
        return view('conclusao_pesquisa');
    }
    
    
    /*
    /////////////////// ADMINISTRAÇÃO DAS PESQUISAS /////////////////////
    */
    public function dashboard()
    {
        $pesquisas = Pesquisa::get();
        $parametros = [
            'pesquisas'=> $pesquisas,
        ];
        return view('admin.dashboard', $parametros);
    }

    public function newPesquisa()
    {
        return view('admin.new-pesquisa');
    }

    public function storePesquisa(Request $request)
    { 
        $pesquisa = new Pesquisa;

        $pesquisa->user_id = auth()->user()->id;
        $pesquisa->titulo = $request->titulo;
        $pesquisa->descricao = $request->descricao;
        $pesquisa->url_slug = Str::slug($request->url_slug, '-');
        $pesquisa->pesquisa_inicio  = Carbon::parse($request->pesquisa_inicio)->format('Y-m-d\TH:i');
        $pesquisa->pesquisa_final  = Carbon::parse($request->pesquisa_final)->format('Y-m-d\TH:i');
        $pesquisa->perguntas_por_tela = $request->perguntas_por_tela;
        $pesquisa->pag_apresentacao = $request->pag_apresentacao;
        $pesquisa->txt_pag_apresentacao = $request->txt_pag_apresentacao;
        $pesquisa->consentimento = $request->consentimento;
        $pesquisa->txt_consentimento = $request->txt_consentimento;
        if($request->file('bgimage')){
            $randomTxt = Str::random(20);
            $file= $request->file('bgimage');
            $filename= $randomTxt.date('YmdHi').$file->getClientOriginalName();
            $file-> move(public_path('public/uploads'), $filename);
            $pesquisa->bgimage = $filename;
        }
        $pesquisa->bgcor = $request->bgcor;
        $pesquisa->txtcor = $request->txtcor;

        //Grava dados da pesquisa e retorna o registro da pesquisa
        $pesquisa->save();
        $reg = $pesquisa->id;                
        
        //Laço para gravar as perguntas e atributos
        $perguntas = $request->txt_pergunta;
        $perguntasTipos = $request->tipo;
        $qtdeOpcResp = $request->qtdeOpcResp;
        $imagensPergunta = $request->file('midia'); //Imagem para a pergunta

        for($i=0; $i < count($perguntas); $i++)
        {
            $pergunta = new Pergunta;
            $pergunta->id_pesquisa = $reg;
            $pergunta->txt_pergunta = $perguntas[$i];
            $pergunta->tipo = $perguntasTipos[$i];

            if(isset($imagensPergunta[$i])){
                $randomTxtImgPerg = Str::random(20);
                $fileImgPerg= $imagensPergunta[$i];
                $filenameImgPerg= $randomTxtImgPerg.date('YmdHi').$fileImgPerg->getClientOriginalName();
                $fileImgPerg-> move(public_path('public/uploads'), $filenameImgPerg);
                $pergunta->midia = $filenameImgPerg;
            }

            $pergunta->save();
            $regPergunta = $pergunta->id;

            //Se o tipo for checkbox ou radio grava as opções de resposta - laço de opções
            if($perguntasTipos[$i] == 'checkbox' || $perguntasTipos[$i] == 'radio'){
                //Nomes dos INPUTS na view são dinâmicos - relacionados com a sequencia das questões $i
                $opcoesRespostas = $request->input('txt_opc_resposta' .$i);
                $numEnd = $qtdeOpcResp[$i];

                for($iOpc=0; $iOpc < $numEnd; $iOpc++)
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

    public function resultados(int $id_pesquisa, int $metadados = null)
    {
        $pesquisa = Pesquisa::where('id', $id_pesquisa)->first();
        $resultados = Resultado::where('id_pesquisa', $id_pesquisa)->first();
        $result_dados = Result_dado::where('id_resultados', $resultados->id)->get();
        $txt_perguntas = Pergunta::where('id_pesquisa', $pesquisa->id)->get();

        $parametros = [
            'pesquisa' => $pesquisa,
            'resultados'=> $resultados,
            'result_dados'=> $result_dados,
            'txt_perguntas'=> $txt_perguntas,
        ];

        //dd($pesquisa, $resultados, $result_dados, $txt_perguntas);

        //Se o parâmetro opcional $metadados com valor 1 for passado,
        //carrega a VIEW resultfulldata com METADADOS
        if($metadados == 1){
            return view('admin.resultfulldata', $parametros);
        }else{            
            return view('admin.resultado', $parametros);
        }
    }

    public function editar(int $id)
    {
        dd('EDITAR: ' .$id);
    }

    public function duplicar(int $id)
    {
        dd('DUPLICAR: ' .$id);
    }

    public function excluir(int $id)
    {
        dd('EXCLUIR: ' .$id);
    }
}
