<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Resultado extends Model
{
    use HasFactory;
    protected $fillable=['aceite', 'ip_usuario', 'navegador', 'data_hora_inicio', 'data_hora_final', 'completo'];

    public function pesquisa()
    {
        return $this->belongsTo(Pesquisa::class);
    }

    public function result_dado()
    {
        return $this->hasMany(Result_dado::class);
    }

}
