<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pergunta extends Model
{
    use HasFactory;
    protected $fillable=['tipo', 'txt_pergunta', 'id_opc_resposta', 'midia'];

    public function pesquisa()
    {
        return $this->belongsTo(Pesquisa::class);
    }

    public function opc_resposta()
    {
        return $this->hasMany(Opc_resposta::class);
    }

    public function result_dado()
    {
        return $this->hasMany(Result_dado::class);
    }

}
