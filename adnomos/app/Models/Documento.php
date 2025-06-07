<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Documento extends Model
{
    protected $fillable = [
        'caso_id',
        'nome',
        'path',
    ];

    public function caso(){
        return $this->belongsTo(Caso::class);
    }
}
