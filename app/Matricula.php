<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Matricula extends Model
{
    protected $table = 'matriculas';
    protected $fillable = ['serie_id','turma_id','ano_letivo_id','aluno_id'];
}
