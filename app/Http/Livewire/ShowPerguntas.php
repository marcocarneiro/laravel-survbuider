<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pergunta;

class ShowPerguntas extends Component
{    
    public $perguntas = [];
    public $opcoes = [];  
    public $reg;
    
    //Adiciona e remove perguntas
    public function addNew()
    {
        $this->perguntas[] = [];
    }
    public function remove($index)
    {
        unset($this->perguntas[$index]);
        $this->perguntas = array_values($this->perguntas);
    }

    //Adiciona e remove opções de respostas
    public function addOpcoes()
    {
        $this->opcoes[] = [];
    }
    public function removeOpcoes($index)
    {
        unset($this->opcoes[$index]);
        $this->opcoes = array_values($this->opcoes);
    }

    
    public function store($dados)
    {   
        dump($dados);
        /* foreach ($this->perguntas as $perg) {
            $pergunta = new Pergunta;
            $pergunta->id_pesquisa = $this->reg;
            if(isset($perg['id_grupo'])){$pergunta->id_grupo = $perg['id_grupo'];}
            if(isset($perg['tipo'])){$pergunta->tipo = $perg['tipo'];}
            if(isset($perg['txt_pergunta'])){$pergunta->txt_pergunta = $perg['txt_pergunta'];}
            if(isset($perg['id_opc_resposta'])){$pergunta->id_opc_resposta = $perg['id_opc_resposta'];}
            $pergunta->save();

            if($perg['tipo'] == 'checkbox' || $perg['tipo'] == 'radio'){
                //grava opções de resposta na tabela opc_resposta
                //dump($this->opcoes, $pergunta->id);
                foreach ($this->opcoes as $opc) {
                    dump($opc['txt_opc_resposta'], $pergunta->id);
                }
            }
        }
        return redirect('dashboard'); */
    }
        
    public function render()
    {
        return view('livewire.show-perguntas')->layout('admin.base');
    }
}
