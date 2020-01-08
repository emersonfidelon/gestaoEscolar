<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $table = 'matriculas';
    protected $fillable = ['codmatricula','serie_id','turma_id','ano_letivo_id','aluno_id'];
    
    public function serie(){
        return $this->belongsTo(Serie::class, 'serie_id', 'id');
    }

    public function turma(){
        return $this->belongsTo(Turma::class, 'turma_id', 'id');
    }

    public function anoletivo(){
        return $this->belongsTo(AnoLetivo::class, 'ano_letivo_id', 'id');
    }

    public function aluno(){
        return $this->belongsTo(Aluno::class, 'aluno_id', 'id');
    }
}
