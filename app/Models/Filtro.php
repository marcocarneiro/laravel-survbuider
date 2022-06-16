<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Filtro extends Model
{
    use HasFactory;
    protected $fillable=['txt_filtro'];
    
    public function pesquisa()
    {
        return $this->belongsTo(Pesquisa::class);
    }
    public function pergunta()
    {
        return $this->hasMany(Pergunta::class);
    }
}
