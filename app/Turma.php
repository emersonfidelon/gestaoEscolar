<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Turma extends Model
{
    protected $fillable = ['name','serie_id','turno_id','ano_letivo_id'];

    public function fullDescription(){
        return "{$this->serie->name} / {$this->name} / {$this->turno->name} / {$this->anoletivo->descricao}";
    }

    public function serie(){
        return $this->belongsTo(Serie::class, 'serie_id', 'id');
    }

    public function turno(){
        return $this->belongsTo(Turno::class, 'turno_id', 'id');
    }

    public function anoletivo(){
        return $this->belongsTo(AnoLetivo::class, 'ano_letivo_id', 'id');
    }
}
