<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Serie extends Model
{
    protected $fillable = ['name','ano_letivo_id'];

    public function turmas(){
        return $this->hasMany(Turma::class, 'serie_id', 'id');
    }

    public function anoletivo(){
        return $this->belongsTo(AnoLetivo::class, 'ano_letivo_id');
    }
}
