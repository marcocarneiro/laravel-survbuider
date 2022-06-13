<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\Pesquisa;
use App\Models\Filtro;
use App\Models\Pergunta;
use App\Models\Opc_resposta;
use App\Models\Consentimento;
use App\Models\Resultado;

class NovaPesquisa extends Component
{
    //Campos configuração da pesquisa
    public $titulo = '';
    public $pesquisa_inicio;
    public $pesquisa_final;
    public $perguntas_por_tela = 1;
    public $consentimento = false;
    public $txt_consentimento = '';
    //public $id;

    //campos para filtro da pesquisa (opcional)


    //campos para as perguntas da pesquisa

    
    public function render()
    {
        return view('livewire.nova-pesquisa');
    }

    public function show_consent()
    {
        if($this->consentimento){
            $this->consentimento = false;
        }else{
            $this->consentimento = true;
        }
    }

    public function createPesquisa()
    {
        $pesquisa = new Pesquisa;
        //dd($this->titulo, $this->pesquisa_inicio, $this->pesquisa_final, $this->perguntas_por_tela, $this->consentimento, $this->txt_consentimento);
        $pesquisa->user_id = auth()->user()->id;
        $pesquisa->titulo = $this->titulo;
        $pesquisa->pesquisa_inicio  = $this->pesquisa_inicio;
        $pesquisa->pesquisa_final = $this->pesquisa_final;
        $pesquisa->perguntas_por_tela = $this->perguntas_por_tela;
        $pesquisa->consentimento = $this->consentimento;
        $pesquisa->txt_consentimento = $this->txt_consentimento;

        $pesquisa->save();

    }
}
