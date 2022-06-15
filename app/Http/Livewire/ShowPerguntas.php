<?php

namespace App\Http\Livewire;

use Livewire\Component;

class ShowPerguntas extends Component
{
    // Verificar:  https://gist.github.com/webdevmatics/11290b6e9ae75469f6f017741bfb679f 
    
    public $perguntas = [];

    public function addNew()
    {
        $this->perguntas[] = [];
    }

    public function remove($index)
    {
        unset($this->perguntas[$index]);
        $this->perguntas = array_values($this->perguntas);
    }
    
    public function render()
    {
        return view('livewire.show-perguntas');
    }
}
