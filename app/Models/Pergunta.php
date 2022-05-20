<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pergunta extends Model
{
    use HasFactory;

    public function pesquisa()
    {
        return $this->belongsTo(Pesquisa::class);
    }

    public function opc_resposta()
    {
        return $this->hasMany(Opc_resposta::class);
    }


}
