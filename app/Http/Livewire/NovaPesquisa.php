<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Str;

use App\Models\User;
use App\Models\Pesquisa;
use App\Models\Filtro;
use App\Models\Pergunta;
use App\Models\Opc_resposta;
use App\Models\Consentimento;
use App\Models\Resultado;

class NovaPesquisa extends Component
{
    //Propriedades
    public $titulo = '';
    public $pesquisa_inicio;
    public $pesquisa_final;
    public $perguntas_por_tela = 1;
    public $consentimento = false;
    public $txt_consentimento = '';
    public $reg = 0;
    public $showPerguntas = 'hidden';
    public $hiddenbtn = '';
    public $hiddenTiny = 'absolute invisible';
    
    
    
    
    public function render()
    {
        return view('livewire.nova-pesquisa');
    }

    public function show_consent()
    {
        if($this->consentimento){
            $this->consentimento = false;
            $this->hiddenTiny = 'hidden';
        }else{
            $this->consentimento = true;
            $this->hiddenTiny = 'visible';
        }
    }

    public function createPesquisa()
    {
        $pesquisa = new Pesquisa;

        $pesquisa->user_id = auth()->user()->id;
        $pesquisa->titulo = $this->titulo;
        $pesquisa->slug = Str::slug($this->titulo, '-');
        $pesquisa->pesquisa_inicio  = $this->pesquisa_inicio;
        $pesquisa->pesquisa_final = $this->pesquisa_final;
        $pesquisa->perguntas_por_tela = $this->perguntas_por_tela;
        $pesquisa->consentimento = $this->consentimento;
        $pesquisa->txt_consentimento = $this->txt_consentimento;

        //Grava ou atualiza dados da pesquisa
        if ($this->reg == 0) {
            $pesquisa->save();           
            $this->reg = $pesquisa->id;
        } else {
            Pesquisa::find($this->reg)->update([
                'titulo' => $this->titulo,
                'slug' => Str::slug($this->titulo, '-'),
                'pesquisa_inicio' => $this->pesquisa_inicio,
                'pesquisa_final' => $this->pesquisa_final,
                'perguntas_por_tela' => $this->perguntas_por_tela,
                'consentimento' => $this->consentimento,
                'txt_consentimento' => $this->txt_consentimento,
            ]);
        }
        
        $this->showPerguntas = '';
        $this->hiddenbtn = 'hidden';
    }

    public function mostraPesquisa()
    {
        $this->showPerguntas = 'hidden';
        $this->hiddenbtn = '';
    }
}
