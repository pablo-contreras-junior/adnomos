<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Caso extends Model

{
    
    protected $fillable = [
        'user_id',
        'polo_ativo',
        'assunto',
        'numero_processo',
        'tribunal',
        'assunto',
        'encerrado',
        'orgaoJugador',
    ];
    
    public function usuario(){
        return $this->belongsTo(User::class);
    }

    public function comentarios(){
        return $this->hasMany(Comentario::class);
    }

    public function documentos(){
        return $this->hasMany(Documento::class);
    }
}
