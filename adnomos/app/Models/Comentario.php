<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Comentario extends Model
{
    protected $fillable = [
        'caso_id',
        'titulo',
        'conteudo',
    ];

    public function caso(){
        return $this->belongsTo(Caso::class);
    }


}
