<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class Tarefa extends Model
{
    protected $fillable = [
        'user_id',
        'titulo',
        'conteudo',
        'finalizada"k',
    ];

    public function usuario(){
        $this->belongsTo(User::class);
    }
}
