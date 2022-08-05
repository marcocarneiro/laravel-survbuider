<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result_dado extends Model
{
    use HasFactory;
    protected $fillable=['resposta'];

    public function resultado()
    {
        return $this->belongsTo(Resultado::class);
    }

    public function pergunta()
    {
        return $this->belongsTo(Pergunta::class);
    }
    
}
