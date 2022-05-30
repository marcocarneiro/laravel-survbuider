<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Consentimento extends Model
{
    use HasFactory;
    public function pesquisa()
    {
        return $this->belongsTo(Pesquisa::class);
    }
}
