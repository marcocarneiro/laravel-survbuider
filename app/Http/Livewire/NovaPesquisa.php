<?php

namespace App\Http\Livewire;

use Livewire\Component;

class NovaPesquisa extends Component
{
    public $consent = false;
    
    public function render()
    {
        return view('livewire.nova-pesquisa');
    }

    public function show_consent()
    {
        if($this->consent){
            $this->consent = false;
        }else{
            $this->consent = true;
        }
    }
}
