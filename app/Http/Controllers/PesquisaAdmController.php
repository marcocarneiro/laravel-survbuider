<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
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
        //$user = auth()->user();
        return view('admin.new-pesquisa');
    }
}
