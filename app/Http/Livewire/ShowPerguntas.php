<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pergunta;

class ShowPerguntas extends Component
{    
    public $perguntas = [];
    public $reg;

    public function addNew()
    {
        $this->perguntas[] = [];
    }

    public function remove($index)
    {
        unset($this->perguntas[$index]);
        $this->perguntas = array_values($this->perguntas);
    }

    public function store()
    {
        $pergunta = new Pergunta;
        //$pergunta->id_pesquisa = $this->reg;
        foreach ($this->perguntas as $perg) {
            $pergunta->id_pesquisa = $this->reg;
            if(isset($pergunta->id_grupo)){$pergunta->id_grupo = $perg['id_grupo'];}
            if(isset($pergunta->tipo)){$pergunta->tipo = $perg['tipo'];}
            if(isset($pergunta->txt_pergunta)){$pergunta->txt_pergunta = $perg['txt_pergunta'];}
            if(isset($pergunta->id_opc_resposta)){$pergunta->id_opc_resposta = $perg['id_opc_resposta'];}
            $pergunta->save();

            //dd($perg);
            /* $pergunta->id_pesquisa = $this->reg;
            $pergunta->id_grupo = $perg['id_grupo'];
            $pergunta->tipo = $perg['tipo'];
            $pergunta->txt_pergunta = $perg['txt_pergunta'];
            $pergunta->id_opc_resposta = $perg['id_opc_resposta'];

            $pergunta->save(); */
        }
        //dd($this->perguntas);
    }
        
    public function render()
    {
        return view('livewire.show-perguntas')->layout('admin.base');
    }
}
