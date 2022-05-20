<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pesquisa extends Model
{
    use HasFactory;
    
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function pergunta()
    {
        return $this->hasMany(Pergunta::class);
    }

    public function resultado()
    {
        return $this->hasMany(Resultado::class);
    }


}
