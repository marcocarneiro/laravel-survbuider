<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Opc_resposta extends Model
{
    use HasFactory;
    protected $fillable=['txt_opc_resposta'];

    public function pergunta()
    {
        return $this->belongsTo(Pergunta::class);
    }

}
