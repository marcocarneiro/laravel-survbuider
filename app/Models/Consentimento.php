<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consentimento extends Model
{
    use HasFactory;
    protected $fillable=['titulo', 'slug', 'pesquisa_inicio', 'pesquisa_final', 'perguntas_por_tela', 'consentimento', 'txt_consentimento'];
    public function pesquisa()
    {
        return $this->belongsTo(Pesquisa::class);
    }
}
