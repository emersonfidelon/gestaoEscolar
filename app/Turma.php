<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $fillable = ['name','serie_id','turno_id'];

    public function serie(){
        return $this->belongsTo(Serie::class, 'serie_id', 'id');
    }

    public function turno(){
        return $this->belongsTo(Turno::class, 'turno_id', 'id');
    }
}
