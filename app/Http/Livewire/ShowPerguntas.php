<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Pergunta;

class ShowPerguntas extends Component
{    
    public $perguntas = [];
    public $reg;
    public $idPergunta = 0;

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
        foreach ($this->perguntas as $perg) {
            $pergunta = new Pergunta;
            $pergunta->id_pesquisa = $this->reg;
            if(isset($perg['id_grupo'])){$pergunta->id_grupo = $perg['id_grupo'];}
            if(isset($perg['tipo'])){$pergunta->tipo = $perg['tipo'];}
            if(isset($perg['txt_pergunta'])){$pergunta->txt_pergunta = $perg['txt_pergunta'];}
            if(isset($perg['id_opc_resposta'])){$pergunta->id_opc_resposta = $perg['id_opc_resposta'];}
            $pergunta->save();
        }
        return redirect('dashboard');
    }
        
    public function render()
    {
        return view('livewire.show-perguntas')->layout('admin.base');
    }
}
